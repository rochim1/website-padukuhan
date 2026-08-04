@extends('layouts.app')
@section('title',$item['title'])
@section('content')
@include('components.page-hero',['eyebrow'=>$item['category'],'title'=>$item['title'],'description'=>$item['text']])
<section class="section"><div class="shell split"><div class="landscape"><img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"></div><div class="copy"><span class="eyebrow">Potensi Warga</span><h2>Dikembangkan oleh <em>{{ $item['owner'] }}</em></h2><p>{{ $item['text'] }} Potensi ini dikembangkan dengan mengutamakan keterlibatan warga, kualitas, dan keberlanjutan manfaat bagi lingkungan sekitar.</p><div class="contact-card"><i class="ri-whatsapp-line"></i><div><small>Kontak pengelola</small><strong>{{ $item['contact'] }}</strong></div></div><a class="button primary" href="https://wa.me/62{{ ltrim(preg_replace('/\D/','',$item['contact']),'0') }}" target="_blank" rel="noopener">Hubungi via WhatsApp</a></div></div></section>
@endsection
