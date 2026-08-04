@extends('layouts.app')
@section('title','Galeri Padukuhan')
@section('content')
@include('components.page-hero',['eyebrow'=>'Rekam Kebersamaan','title'=>'Galeri Padukuhan','description'=>'Potret kegiatan, bentang wilayah, dan keseharian warga '.$name.'.'])
<section class="section"><div class="shell gallery-grid">@foreach($gallery as $image)<figure class="gallery-item"><img src="{{ $image }}" alt="Dokumentasi {{ $name }}" loading="lazy"><figcaption>Dokumentasi warga · {{ date('Y') }}</figcaption></figure>@endforeach</div></section>
@endsection
