<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_all_public_pages_return_successfully(): void
    {
        foreach (['/', '/profil', '/kegiatan', '/potensi', '/layanan', '/pengaduan', '/struktur', '/fasilitas', '/galeri', '/transparansi', '/kontak', '/kegiatan/kerja-bakti-jalur-hijau-4a5cd4', '/potensi/kerajinan-bambu', '/layanan/sp-001-surat-pengantar'] as $path) {
            $this->get($path)->assertOk();
        }
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
