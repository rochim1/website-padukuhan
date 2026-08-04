@extends('layouts.app')
@section('title',$item['title'])
@section('content')
@include('components.page-hero',['eyebrow'=>'Detail Layanan','title'=>$item['title'],'description'=>'Persyaratan, estimasi, dan tahapan pengajuan '.$item['title'].'.'])
<section class="section"><div class="shell service-detail-grid"><div><span class="eyebrow">Persyaratan</span><h2>Dokumen yang perlu disiapkan</h2><ul class="check-list">@foreach($item['requirements'] as $requirement)<li><i class="ri-checkbox-circle-fill"></i>{{ $requirement }}</li>@endforeach</ul><div class="estimate-box"><i class="ri-time-line"></i><div><small>Estimasi penyelesaian</small><strong>{{ $item['estimate'] }}</strong></div></div></div><div><span class="eyebrow">Tahapan</span><h2>Alur permohonan</h2><ol class="timeline-list">@foreach($item['steps'] as $step)<li><b>{{ $loop->iteration }}</b><span>{{ $step }}</span></li>@endforeach</ol><a class="button primary" href="mailto:{{ $email }}?subject={{ urlencode('Permohonan '.$item['title']) }}">Mulai Konsultasi <i class="ri-arrow-right-line"></i></a></div></div></section>
@endsection
