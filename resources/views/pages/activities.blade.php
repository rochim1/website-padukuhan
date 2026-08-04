@extends('layouts.app')
@section('title','Kegiatan Warga')
@section('content')
@include('components.page-hero',['eyebrow'=>'Kabar Padukuhan','title'=>'Kegiatan Warga','description'=>'Cerita gotong royong, pelayanan, pembinaan, dan kebersamaan warga.'])
<section class="section"><div class="shell news-grid archive">@foreach(array_merge($activities,$activities) as $index=>$item)<article class="news-card"><a href="{{ route('activities.show',$item['slug']) }}"><img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"></a><div><span class="news-date"><i class="ri-calendar-line"></i>{{ $item['date'] }}</span><h3>{{ $item['title'] }}</h3><p>{{ $item['excerpt'] }}</p><a class="text-link" href="{{ route('activities.show',$item['slug']) }}">Baca selengkapnya <i class="ri-arrow-right-line"></i></a><br><span class="tag">{{ ['Gotong Royong','Pemberdayaan','Kesehatan'][$index%3] }}</span></div></article>@endforeach</div></section>
@endsection
