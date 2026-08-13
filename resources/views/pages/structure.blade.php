@extends('layouts.app')
@section('title','Struktur Pengurus')
@push('styles')<link rel="stylesheet" href="{{ asset('css/org-tree.css') }}">@endpush
@section('content')
@include('components.page-hero',['eyebrow'=>'Kelembagaan','title'=>'Struktur Pengurus','description'=>'Pengurus yang melayani dan menggerakkan program '.$name.'.'])
@php
  $normalizedOfficials = collect($officials)->values()->map(fn($member,$index)=>array_merge($member,['id'=>$member['id'] ?? $member['_id'] ?? 'fallback-'.$index]));
  $memberIds = $normalizedOfficials->pluck('id')->map(fn($id)=>(string)$id)->all();
  $roots = $normalizedOfficials->filter(fn($member)=>empty($member['parent_id']) || !in_array((string)$member['parent_id'],$memberIds,true))->values();
@endphp
<section class="section"><div class="shell">
  @if($roots->isEmpty())
    <div class="org-empty"><i class="ri-organization-chart"></i><h3>Struktur belum tersedia</h3><p>Data kepengurusan belum dipublikasikan.</p></div>
  @else
    <div class="public-org-tree" role="tree" aria-label="Struktur pengurus {{ $name }}"><ul class="public-org-roots">@foreach($roots as $member) @include('components.org-tree-node',['member'=>$member,'members'=>$normalizedOfficials]) @endforeach</ul></div>
  @endif
</div></section>
@endsection
