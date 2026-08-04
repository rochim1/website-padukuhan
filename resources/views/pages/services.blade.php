@extends('layouts.app')
@section('title','Layanan Warga')
@section('content')
@include('components.page-hero',['eyebrow'=>'Mudah & Terarah','title'=>'Layanan Warga','description'=>'Temukan persyaratan dan alur sebelum mengajukan permohonan kepada pengelola padukuhan.'])
<section class="section"><div class="shell service-grid">@foreach($services as $service)<a href="{{ route('services.show',$service['slug']) }}" class="service-card"><i class="{{ $service['icon'] }}"></i><div><h3>{{ $service['title'] }}</h3><p>{{ implode(', ',array_slice($service['requirements'],0,2)) }}.</p><span><i class="ri-time-line"></i> {{ $service['estimate'] }}</span></div><i class="ri-arrow-right-line service-arrow"></i></a>@endforeach</div><div class="service-flow"><span class="eyebrow">Alur Sederhana</span><div>@foreach(['Pilih layanan','Siapkan dokumen','Ajukan permohonan','Pantau proses','Ambil hasil'] as $i=>$step)<article><b>{{ $i+1 }}</b><span>{{ $step }}</span></article>@endforeach</div></div></section>
@endsection
