<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['services.pantoo_village.allow_demo_fallback' => true]);
        config(['services.pantoo_village.organization_code' => 'PRUJAKAN-DEMO']);
        config(['padukuhan.organization_code' => 'PRUJAKAN-DEMO']);
        Http::fake(function (Request $request) {
            if (str_contains((string) $request->body(), 'SubmitVillagePublicComplaint')) {
                return Http::response(['data' => ['SubmitVillagePublicComplaint' => ['complaint_number' => 'PUB-TEST-001', 'tracking_token' => 'token-test-aman', 'status' => 'RECEIVED']]]);
            }
            return Http::response([], 503);
        });
    }

    public function test_all_public_pages_return_successfully(): void
    {
        foreach (['/', '/profil', '/kegiatan', '/agenda', '/potensi', '/wisata', '/sponsor', '/layanan', '/pengaduan', '/struktur', '/fasilitas', '/galeri', '/transparansi', '/kontak', '/kegiatan/kerja-bakti-jalur-hijau', '/potensi/kerajinan-bambu', '/wisata/jelajah-sungai', '/sponsor/koperasi-sejahtera', '/layanan/surat-pengantar'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_sponsorship_appears_on_landing_and_has_detail_page(): void
    {
        $this->get('/')->assertOk()->assertSee('Koperasi Sejahtera');
        $this->get('/sponsor/koperasi-sejahtera')->assertOk()->assertSee('Mitra Ekonomi Warga')->assertSee('https://example.com', false);
    }

    public function test_tourism_detail_uses_destination_seo_and_normalized_whatsapp(): void
    {
        $this->get('/wisata/jelajah-sungai')
            ->assertOk()
            ->assertSee('<meta name="description" content="Jelajahi alam dan kehidupan warga di Padukuhan Prujakan, Sinduharjo, Ngaglik.">', false)
            ->assertSee('https://wa.me/6281233334455', false)
            ->assertSee('TouristAttraction', false);
    }

    public function test_unknown_detail_slug_returns_not_found(): void
    {
        $this->get('/kegiatan/tidak-ada')->assertNotFound();
        $this->get('/potensi/tidak-ada')->assertNotFound();
        $this->get('/layanan/tidak-ada')->assertNotFound();
    }

    public function test_complaint_requires_core_fields(): void
    {
        $this->post('/pengaduan', [])->assertSessionHasErrors(['category', 'title', 'description']);
    }

    public function test_valid_complaint_returns_confirmation(): void
    {
        $this->post('/pengaduan', [
            'category' => 'Lingkungan',
            'title' => 'Lampu jalan mati',
            'description' => 'Lampu jalan di RT 03 mati sejak kemarin malam.',
        ])->assertRedirect('/pengaduan')->assertSessionHas('success');
    }
}
