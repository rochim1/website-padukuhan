@extends('layouts.app')
@section('title','Agenda Padukuhan')
@section('content')
@include('components.page-hero',['eyebrow'=>'Jadwal Warga','title'=>'Agenda Padukuhan','description'=>'Jadwal kegiatan dan pertemuan yang telah dipublikasikan.'])
<section class="section"><div class="shell news-grid archive">
@forelse($agenda as $item)<article class="news-card">@if($item['image'])<img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">@endif<div><span class="tag">{{ $item['badge'] }}</span><span class="news-date"><i class="ri-calendar-event-line"></i>{{ $item['date'] }}</span><h3>{{ $item['title'] }}</h3><p>{{ $item['description'] }}</p>@if($item['cta_url'])<a class="text-link" href="{{ $item['cta_url'] }}">{{ $item['cta_label'] ?: 'Selengkapnya' }} <i class="ri-arrow-right-line"></i></a>@endif</div></article>
@empty<p>Belum ada agenda yang dipublikasikan.</p>@endforelse
</div></section>
@endsection
