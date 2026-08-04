@extends('layouts.app')
@section('title','Struktur Pengurus')
@section('content')
@include('components.page-hero',['eyebrow'=>'Kelembagaan','title'=>'Struktur Pengurus','description'=>'Pengurus yang melayani dan menggerakkan program '.$name.'.'])
<section class="section"><div class="shell"><div class="org-chart"><article class="official-card primary-official"><span><i class="{{ $officials[0]['icon'] }}"></i></span><small>{{ $officials[0]['position'] }}</small><h3>{{ $officials[0]['name'] }}</h3></article><div class="org-line"></div><div class="official-grid">@foreach(array_slice($officials,1) as $person)<article class="official-card"><span><i class="{{ $person['icon'] }}"></i></span><small>{{ $person['position'] }}</small><h3>{{ $person['name'] }}</h3></article>@endforeach</div></div></div></section>
@endsection
