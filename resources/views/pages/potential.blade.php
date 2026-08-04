@extends('layouts.app')
@section('title','Potensi Lokal')
@section('content')
@include('components.page-hero',['eyebrow'=>'Tumbuh Bersama','title'=>'Potensi Lokal','description'=>'Produk, alam, keterampilan, dan inisiatif warga yang layak dikenal lebih luas.'])
<section class="section"><div class="shell potential-grid large">@foreach($potentials as $item)<article class="potential-card"><span><i class="{{ $item['icon'] }}"></i></span><small>{{ $item['category'] }}</small><h3>{{ $item['title'] }}</h3><p>{{ $item['text'] }}</p><a class="text-link" href="{{ route('potential.show',$item['slug']) }}">Lihat detail <i class="ri-arrow-right-line"></i></a></article>@endforeach</div></section>
<section class="section muted"><div class="shell civic-inner dark-copy"><div><span class="eyebrow">Kolaborasi</span><h2>Punya usaha atau potensi yang ingin ditampilkan?</h2><p>Hubungi pengelola untuk pendataan dan kurasi etalase potensi warga.</p></div><a class="button primary" href="mailto:{{ $email }}">Hubungi Pengelola</a></div></section>
@endsection
