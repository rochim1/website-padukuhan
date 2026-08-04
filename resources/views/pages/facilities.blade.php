@extends('layouts.app')
@section('title','Fasilitas Umum')
@section('content')
@include('components.page-hero',['eyebrow'=>'Sarana Warga','title'=>'Fasilitas Umum','description'=>'Informasi sarana pelayanan, kesehatan, pendidikan, ibadah, dan kegiatan warga.'])
<section class="section"><div class="shell facility-grid">@foreach($facilities as $facility)<article><span><i class="{{ $facility['icon'] }}"></i></span><div><small>{{ $facility['type'] }}</small><h3>{{ $facility['name'] }}</h3><p><i class="ri-map-pin-line"></i>{{ $facility['address'] }}</p></div></article>@endforeach</div></section>
@endsection
