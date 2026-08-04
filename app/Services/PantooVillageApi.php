<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class PantooVillageApi
{
    public function portal(bool $fresh = false): array
    {
        $key = 'pantoo-village-portal-'.config('services.pantoo_village.organization_code');
        if ($fresh) Cache::forget($key);
        try { return Cache::remember($key, now()->addMinutes(5), fn () => $this->fetchPortal()); }
        catch (\Throwable $error) { report($error); return config('padukuhan'); }
    }

    public function submitComplaint(array $input): array
    {
        $query = <<<'GQL'
mutation Submit($code:String!,$input:VillagePublicComplaintInput!){
  SubmitVillagePublicComplaint(organization_code:$code,input:$input){ complaint_number status }
}
GQL;
        return $this->request($query, ['code' => $this->code(), 'input' => $input])['SubmitVillagePublicComplaint'];
    }

    private function fetchPortal(): array
    {
        $query = <<<'GQL'
query Portal($code:String!){ GetVillagePublicPortal(organization_code:$code){
 organization{ organization_code display_name }
 family_count resident_count active_resident_count finance_income_minor finance_expense_minor finance_surplus_minor active_arisan_count
 profile{ greeting{ official_name position photo title content term_start term_end is_published } history vision missions address village_name district_name regency_name province_name postal_code latitude longitude rt_count rw_count structure{ _id name position photo parent_id description phone email order } public_items{ _id category category_label name description image address contact tagline gallery opening_hours ticket_price facilities activities latitude longitude booking_url seo_description order } publication{ population_statistics finance_transparency arisan_information } }
 activities{ _id slug title excerpt content image published_at category }
 services{ _id code name description required_documents estimated_days }
}}
GQL;
        $portal = $this->request($query, ['code' => $this->code()])['GetVillagePublicPortal'];
        return $this->normalize($portal);
    }

    private function request(string $query, array $variables): array
    {
        $response = Http::acceptJson()->timeout(8)->retry(2, 250)->post(config('services.pantoo_village.graphql_url'), compact('query', 'variables'));
        if (!$response->successful()) throw new RuntimeException('Pantoo API tidak dapat dihubungi.');
        $json = $response->json();
        if (!empty($json['errors'])) throw new RuntimeException($json['errors'][0]['message'] ?? 'Pantoo API mengembalikan kesalahan.');
        return $json['data'] ?? throw new RuntimeException('Respons Pantoo API tidak lengkap.');
    }

    private function code(): string { return config('services.pantoo_village.organization_code'); }
    private function media(?string $url): string
    {
        if (!$url) return '';
        if (Str::startsWith($url, ['http://','https://'])) return $url;
        return rtrim(config('services.pantoo_village.media_url'), '/').'/'.ltrim($url, '/');
    }
    private function normalize(array $p): array
    {
        $base = config('padukuhan'); $profile = $p['profile']; $greeting = $profile['greeting'];
        $items = collect($profile['public_items']);
        $potentials = $items->reject(fn($x)=>in_array($x['category'],['FACILITY','HEALTH','EDUCATION','RELIGION','TOURISM']))->map(fn($x)=>[
            'slug'=>Str::slug($x['name']),'title'=>$x['name'],'category'=>$x['category_label'] ?: ucfirst(strtolower($x['category'])),'icon'=>$this->categoryIcon($x['category']),'text'=>$x['description'],'owner'=>$x['name'],'contact'=>$x['contact'],'image'=>$this->media($x['image']) ?: $base['potentials'][0]['image'],
        ])->values()->all();
        $tourism = $items->where('category','TOURISM')->map(fn($x)=>[
            'slug'=>Str::slug($x['name']),'title'=>$x['name'],'tagline'=>($x['tagline'] ?? '') ?: ($x['category_label'] ?: 'Wisata Padukuhan'),'description'=>$x['description'],
            'image'=>$this->media($x['image']) ?: $base['tourism'][0]['image'],'gallery'=>collect($x['gallery'] ?? [])->map(fn($url)=>$this->media($url))->filter()->values()->all(),
            'address'=>$x['address'] ?: $profile['address'],'contact'=>$x['contact'],'opening_hours'=>$x['opening_hours'] ?? '','ticket_price'=>$x['ticket_price'] ?? '',
            'facilities'=>$x['facilities'] ?? [],'activities'=>$x['activities'] ?? [],'latitude'=>$x['latitude'] ?? $profile['latitude'],'longitude'=>$x['longitude'] ?? $profile['longitude'],
            'booking_url'=>$x['booking_url'] ?? '','seo_description'=>($x['seo_description'] ?? '') ?: strip_tags($x['description']),
        ])->values()->all();
        $facilities = $items->filter(fn($x)=>in_array($x['category'],['FACILITY','HEALTH','EDUCATION','RELIGION']))->map(fn($x)=>['name'=>$x['name'],'type'=>ucfirst(strtolower($x['category'])),'icon'=>$this->categoryIcon($x['category']),'address'=>$x['address']])->values()->all();
        $activities = collect($p['activities'])->map(fn($x)=>[
            'slug'=>$x['slug'],'date'=>$x['published_at'] ? date('d F Y', strtotime($x['published_at'])) : '', 'title'=>$x['title'],'excerpt'=>$x['excerpt'],'content'=>strip_tags($x['content']),'image'=>$this->media($x['image']) ?: $base['activities'][0]['image'],'location'=>$profile['address'], 'category'=>$x['category'],
        ])->all();
        $services = collect($p['services'])->map(fn($x)=>['slug'=>Str::slug($x['code'].'-'.$x['name']),'title'=>$x['name'],'icon'=>'ri-file-text-line','estimate'=>$x['estimated_days'].' hari kerja','requirements'=>$x['required_documents'],'steps'=>['Siapkan dokumen','Ajukan permohonan','Verifikasi petugas','Dokumen diterbitkan']])->all();
        $structure = collect($profile['structure'])->map(fn($x)=>['id'=>$x['_id'],'parent_id'=>$x['parent_id'],'name'=>$x['name'],'position'=>$x['position'],'icon'=>'ri-user-star-line','photo'=>$this->media($x['photo']),'description'=>$x['description']])->all();
        return array_replace($base, [
            'name'=>$p['organization']['display_name'],'location'=>collect([$profile['village_name'],$profile['district_name'],$profile['regency_name']])->filter()->join(', '),'province'=>$profile['province_name'],'address'=>collect([$profile['address'],$profile['village_name'],$profile['district_name'],$profile['regency_name'],$profile['postal_code']])->filter()->join(', '),
            'official'=>['name'=>$greeting['official_name'],'position'=>$greeting['position'],'photo'=>$this->media($greeting['photo']),'title'=>$greeting['title'],'content'=>$greeting['content']],
            'history'=>$profile['history'],'vision'=>$profile['vision'],'missions'=>$profile['missions'],'latitude'=>$profile['latitude'],'longitude'=>$profile['longitude'],'structure'=>$structure,
            'stats'=>[['value'=>number_format((int)$p['active_resident_count'],0,',','.'),'label'=>'Penduduk Aktif','icon'=>'ri-group-line'],['value'=>number_format((int)$p['family_count'],0,',','.'),'label'=>'Kepala Keluarga','icon'=>'ri-home-heart-line'],['value'=>(int)$profile['rt_count'].'/'.(int)$profile['rw_count'],'label'=>'Jumlah RT/RW','icon'=>'ri-community-line'],['value'=>number_format((int)$p['active_arisan_count'],0,',','.'),'label'=>'Arisan Aktif','icon'=>'ri-hand-coin-line']],
            'finance'=>['income'=>(float)$p['finance_income_minor'],'expense'=>(float)$p['finance_expense_minor'],'surplus'=>(float)$p['finance_surplus_minor']],
            'activities'=>$activities ?: $base['activities'],'potentials'=>$potentials ?: $base['potentials'],'tourism'=>$tourism ?: $base['tourism'],'services'=>$services ?: $base['services'],'officials'=>$structure ?: $base['officials'],'facilities'=>$facilities ?: $base['facilities'],
        ]);
    }
    private function categoryIcon(string $category): string { return ['MSME'=>'ri-store-2-line','AGRICULTURE'=>'ri-plant-line','TOURISM'=>'ri-route-line','FACILITY'=>'ri-government-line','HEALTH'=>'ri-heart-pulse-line','EDUCATION'=>'ri-book-open-line','RELIGION'=>'ri-moon-line'][$category] ?? 'ri-community-line'; }
}
