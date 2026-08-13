@extends('layouts.app')
@section('title','Pengaduan Warga')
@section('content')
@include('components.page-hero',['eyebrow'=>'Laporan Terbuka','title'=>'Pengaduan Warga','description'=>'Sampaikan masalah, usulan, atau kebutuhan lingkungan secara jelas dan bertanggung jawab.'])
<section class="section"><div class="shell complaint-layout">
<div class="complaint-copy"><span class="eyebrow">Sebelum Mengirim</span><h2>Bantu kami menindaklanjuti dengan tepat.</h2><p>Sertakan lokasi dan kronologi yang cukup. Anda dapat mengosongkan nama jika ingin mengirim laporan anonim.</p><div class="info-box"><i class="ri-shield-check-line"></i><div><strong>Privasi pelapor dijaga</strong><span>Kontak hanya digunakan untuk klarifikasi dan pembaruan laporan.</span></div></div><div class="info-box"><i class="ri-time-line"></i><div><strong>Verifikasi maksimal 2 hari kerja</strong><span>Simpan nomor dan token pelacakan setelah laporan dikirim.</span></div></div>
<form class="complaint-form mt-4" method="post" action="{{ route('complaint.track') }}">@csrf<h3>Lacak pengaduan</h3>@error('tracking')<div class="alert-error">{{ $message }}</div>@enderror<label>Nomor pengaduan<input name="complaint_number" value="{{ old('complaint_number') }}" required placeholder="PUB-2026-..."></label><label>Token pelacakan<input name="tracking_token" value="{{ old('tracking_token') }}" required autocomplete="off"></label><button class="button glass-dark" type="submit">Lacak Status</button></form>
@if(session('complaint_tracking'))@php($tracking=session('complaint_tracking'))<div class="info-box mt-4"><i class="ri-search-eye-line"></i><div><strong>{{ $tracking['complaint_number'] }} · {{ $tracking['status'] }}</strong><span>{{ $tracking['title'] }}</span></div></div>@endif
</div>
<form class="complaint-form" method="post" action="{{ route('complaint.store') }}">@csrf
@if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
@if(session('complaint_receipt'))<div class="info-box"><i class="ri-key-2-line"></i><div><strong>Token pelacakan</strong><span><code>{{ session('complaint_receipt.tracking_token') }}</code><br>Simpan token ini. Token hanya ditampilkan satu kali.</span></div></div>@endif
@if($errors->any()&&!$errors->has('tracking'))<div class="alert-error">Mohon periksa kembali data yang wajib diisi.</div>@endif
<div class="form-row"><label>Nama <small>(opsional)</small><input name="name" value="{{ old('name') }}" placeholder="Nama pelapor"></label><label>Kontak <small>(opsional)</small><input name="contact" value="{{ old('contact') }}" placeholder="WhatsApp atau email"></label></div>
<label>Kategori<select name="category" required><option value="">Pilih kategori</option><option>Fasilitas Umum</option><option>Lingkungan</option><option>Keamanan</option><option>Pelayanan</option><option>Usulan Kegiatan</option></select></label>
<label>Judul laporan<input name="title" value="{{ old('title') }}" required maxlength="160" placeholder="Ringkas permasalahan"></label><label>Kronologi / keterangan<textarea name="description" required rows="6" maxlength="3000" placeholder="Tuliskan lokasi, waktu, dan detail yang membantu...">{{ old('description') }}</textarea></label><label>Lokasi <small>(opsional)</small><input name="location" value="{{ old('location') }}" maxlength="300"></label><button class="button primary" type="submit">Kirim Pengaduan <i class="ri-send-plane-line"></i></button></form>
</div></section>
@endsection
