@extends('layouts.app')
@section('title','Sponsor & Mitra')
@section('content')
<section class="page-hero"><div class="shell"><span class="eyebrow light">Kolaborasi Padukuhan</span><h1>Sponsor & Mitra</h1><p>Apresiasi untuk organisasi dan pelaku usaha yang ikut mendukung program, pelayanan, dan kemajuan warga.</p></div></section>
<section class="section"><div class="shell"><div class="sponsor-archive">@forelse($sponsors as $item)<article><a class="sponsor-image" href="{{ route('sponsorship.show',$item['slug']) }}"><img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"></a><div><small>{{ $item['tagline'] }}</small><h2>{{ $item['title'] }}</h2><p>{{ strip_tags($item['description']) }}</p><a class="text-link" href="{{ route('sponsorship.show',$item['slug']) }}">Lihat kolaborasi <i class="ri-arrow-right-line"></i></a></div></article>@empty<p>Belum ada sponsorship yang dipublikasikan.</p>@endforelse</div></div></section>
@endsection
