@extends('layouts.app')
@section('title',$item['title'])
@section('content')
<section class="page-hero sponsor-detail-hero"><div class="shell"><span class="eyebrow light">{{ $item['tagline'] }}</span><h1>{{ $item['title'] }}</h1><p>Mitra yang ikut bertumbuh bersama {{ $name }}.</p></div></section>
<section class="section"><div class="shell sponsor-detail"><aside><img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">@if($item['website_url'])<a class="button primary" href="{{ $item['website_url'] }}" target="_blank" rel="noopener noreferrer">Kunjungi website <i class="ri-external-link-line"></i></a>@endif @if($item['contact'])<p><i class="ri-contacts-line"></i>{{ $item['contact'] }}</p>@endif</aside><article><span class="eyebrow">Tentang kolaborasi</span><h2>Dukungan yang memberi dampak</h2><div class="rich-copy">{{ strip_tags($item['description']) }}</div></article></div></section>
@if(count($item['gallery'] ?? []))<section class="section muted"><div class="shell"><div class="section-head"><div><span class="eyebrow">Dokumentasi</span><h2>Jejak kolaborasi</h2></div></div><div class="sponsor-gallery">@foreach($item['gallery'] as $photo)<img src="{{ $photo }}" alt="Dokumentasi {{ $item['title'] }}" loading="lazy">@endforeach</div></div></section>@endif
@endsection
