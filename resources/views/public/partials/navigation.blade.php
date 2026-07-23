<nav class="navbar" aria-label="Navigasi utama">
  <div class="container">
    <a class="nav-logo" href="{{ url('/') }}#utama" aria-label="Tak Banyak Alasan"><img src="{{ asset('assets/admin-logo-blue.png') }}" alt="Tak Banyak Alasan"></a>
    <button class="menu-toggle" id="mobile-menu" aria-label="Buka menu" aria-controls="main-menu" aria-expanded="false"><span></span><span></span><span></span></button>
    <div class="nav-menu" id="main-menu">
      <div class="nav-links">
        <a href="{{ url('/') }}#utama" class="{{ request()->routeIs('home') ? 'active' : '' }}">Utama</a>
        <a href="{{ url('/') }}#mengenai">Mengenai Kami</a>
        <a href="{{ url('/') }}#kegiatan">Kegiatan Kami</a>
        <a href="{{ url('/') }}#aspirasi">Aspirasi</a>
        <a href="{{ url('/') }}#pimpinan">Pimpinan</a>
        <a href="{{ url('/') }}#artikel">Artikel</a>
      </div>
      <div class="nav-btn"><a class="btn btn-red" href="{{ route('bantuan.index') }}">Bantuan &rarr;</a></div>
    </div>
  </div>
</nav>
