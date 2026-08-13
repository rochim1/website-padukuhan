@extends('layouts.app')
@section('title','Galeri Padukuhan')
@section('content')
@include('components.page-hero',['eyebrow'=>'Rekam Kebersamaan','title'=>'Galeri Padukuhan','description'=>'Potret kegiatan, bentang wilayah, dan keseharian warga '.$name.'.'])
<section class="section"><div class="shell gallery-grid">
@forelse($gallery as $item)
@php($image=is_array($item)?($item['image']??''):$item)
<figure class="gallery-item"><img src="{{ $image }}" alt="{{ is_array($item)?($item['title']??'Dokumentasi '.$name):'Dokumentasi '.$name }}" loading="lazy"><figcaption>{{ is_array($item)?($item['title']??'Dokumentasi warga'):'Dokumentasi warga' }}@if(is_array($item)&&!empty($item['category'])) · {{ $item['category'] }}@endif</figcaption></figure>
@empty<p>Belum ada galeri yang dipublikasikan.</p>
@endforelse
</div></section>
@endsection
