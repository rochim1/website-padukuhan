<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  @php($pageSeo = $pageSeo ?? [])
  @php($metaTitle = ($pageSeo['title'] ?? '') ?: trim($__env->yieldContent('title')) ?: ($seo['title'] ?? '') ?: (($website['site_name'] ?? '') ?: $name))
  @php($metaDescription = ($pageSeo['description'] ?? '') ?: ($seo['description'] ?? '') ?: (($website['description'] ?? '') ?: 'Portal informasi resmi '.$name))
  <meta name="description" content="{{ $metaDescription }}"><meta name="theme-color" content="#075f4c">
  <meta name="robots" content="{{ ($seo['robots_index'] ?? true) ? 'index' : 'noindex' }},{{ ($seo['robots_follow'] ?? true) ? 'follow' : 'nofollow' }}">
  @if(!empty($seo['keywords']))<meta name="keywords" content="{{ $seo['keywords'] }}">@endif
  @if(!empty($pageSeo['canonical']) || !empty($seo['canonical']))<link rel="canonical" href="{{ $pageSeo['canonical'] ?? $seo['canonical'] }}">@endif
  <meta property="og:title" content="{{ ($pageSeo['title'] ?? '') ?: (($seo['og_title'] ?? '') ?: $metaTitle) }}"><meta property="og:description" content="{{ ($pageSeo['description'] ?? '') ?: (($seo['og_description'] ?? '') ?: $metaDescription) }}">
  @if(!empty($pageSeo['image']) || !empty($seo['og_image']))<meta property="og:image" content="{{ $pageSeo['image'] ?? $seo['og_image'] }}">@endif
  <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}"><meta name="twitter:title" content="{{ ($seo['twitter_title'] ?? '') ?: $metaTitle }}"><meta name="twitter:description" content="{{ ($seo['twitter_description'] ?? '') ?: $metaDescription }}">
  @if(!empty($pageSeo['image']) || !empty($seo['twitter_image']))<meta name="twitter:image" content="{{ $pageSeo['image'] ?? $seo['twitter_image'] }}">@endif
  @if(!empty($website['favicon']))<link rel="icon" href="{{ $website['favicon'] }}">@endif
  <title>@yield('title', $name) · Portal Padukuhan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/site.css') }}">
  <link rel="stylesheet" href="{{ asset('css/details.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tourism.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sponsorship.css') }}">
  @stack('styles')
</head>
<body>
  <div class="topbar"><div class="shell"><span><i class="ri-map-pin-2-line"></i>{{ $location }}</span><span><i class="ri-mail-line"></i>{{ $email }}</span></div></div>
  <header class="site-header"><div class="shell nav-wrap">
    <a class="brand" href="{{ route('home') }}"><span class="brand-mark"><i class="ri-community-fill"></i></span><span><small>PORTAL RESMI</small><strong>{{ strtoupper($name) }}</strong></span></a>
    <button class="nav-toggle" aria-label="Buka menu" aria-expanded="false"><i class="ri-menu-3-line"></i></button>
    <nav>
      <a class="{{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">Beranda</a>
      <div class="nav-group"><a class="{{ request()->routeIs('profile','structure','facilities','gallery','contact')?'active':'' }}" href="{{ route('profile') }}">Profil <i class="ri-arrow-down-s-line"></i></a><div class="nav-submenu"><a href="{{ route('profile') }}"><i class="ri-book-open-line"></i>Profil & Visi Misi</a><a href="{{ route('structure') }}"><i class="ri-organization-chart"></i>Struktur Pengurus</a><a href="{{ route('facilities') }}"><i class="ri-building-2-line"></i>Fasilitas Umum</a><a href="{{ route('gallery') }}"><i class="ri-gallery-line"></i>Galeri Padukuhan</a><a href="{{ route('contact') }}"><i class="ri-contacts-line"></i>Kontak</a></div></div>
      <a class="{{ request()->routeIs('activities*')?'active':'' }}" href="{{ route('activities') }}">Kegiatan</a>
      <a class="{{ request()->routeIs('agenda')?'active':'' }}" href="{{ route('agenda') }}">Agenda</a>
      <a class="{{ request()->routeIs('potential*')?'active':'' }}" href="{{ route('potential') }}">Potensi</a>
      <a class="{{ request()->routeIs('tourism*')?'active':'' }}" href="{{ route('tourism') }}">Wisata</a>
      <a class="{{ request()->routeIs('sponsorship*')?'active':'' }}" href="{{ route('sponsorship') }}">Sponsor</a>
      <a class="{{ request()->routeIs('services*')?'active':'' }}" href="{{ route('services') }}">Layanan</a>
      <a class="{{ request()->routeIs('transparency')?'active':'' }}" href="{{ route('transparency') }}">Transparansi</a>
      <a class="nav-cta" href="{{ route('complaint') }}"><i class="ri-chat-1-line"></i> Pengaduan</a>
    </nav>
  </div></header>
  <main>@yield('content')</main>
  <footer><div class="shell footer-grid"><div><a class="brand footer-brand" href="{{ route('home') }}"><span class="brand-mark"><i class="ri-community-fill"></i></span><span><small>PORTAL RESMI</small><strong>{{ strtoupper($name) }}</strong></span></a><p>Ruang informasi, pelayanan, dan kolaborasi warga yang terbuka, ramah, dan mudah diakses.</p></div><div><h4>Jelajahi</h4><a href="{{ route('profile') }}">Profil Padukuhan</a><a href="{{ route('tourism') }}">Wisata Padukuhan</a><a href="{{ route('sponsorship') }}">Sponsor & Mitra</a><a href="{{ route('structure') }}">Struktur Pengurus</a><a href="{{ route('facilities') }}">Fasilitas Umum</a><a href="{{ route('gallery') }}">Galeri</a><a href="{{ route('transparency') }}">Transparansi</a><a href="{{ route('contact') }}">Kontak</a></div><div><h4>Kontak</h4><p><i class="ri-map-pin-line"></i>{{ $address }}</p><p><i class="ri-phone-line"></i>{{ $phone }}</p><p><i class="ri-mail-line"></i>{{ $email }}</p></div></div><div class="shell footer-bottom"><span>© {{ date('Y') }} {{ $name }}. Didukung Pantoo.</span><span>Transparan · Tanggap · Guyub</span></div></footer>
  <script src="{{ asset('js/site.js') }}" defer></script>
</body></html>
