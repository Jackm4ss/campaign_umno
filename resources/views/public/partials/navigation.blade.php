<nav class="navbar" aria-label="Navigasi utama">
  <div class="container nav-bar-inner">
    <a class="nav-logo" href="{{ url('/') }}#utama" aria-label="Tak Banyak Alasan">
      <img src="{{ asset('assets/admin-logo-blue.png') }}" alt="Tak Banyak Alasan">
    </a>

    <button class="menu-toggle" id="mobile-menu" type="button" aria-label="Buka menu" aria-controls="main-menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>

  <div class="nav-overlay" id="nav-overlay" hidden></div>

  <aside class="nav-menu" id="main-menu" aria-label="Menu sisi">
    <div class="nav-drawer-head">
      <div class="nav-drawer-brand">
        <img src="{{ asset('assets/admin-logo-blue.png') }}" alt="Tak Banyak Alasan" class="nav-drawer-logo">
      </div>
      <button class="nav-close" id="nav-close" type="button" aria-label="Tutup menu">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="nav-links">
      <a href="{{ url('/') }}#utama" class="{{ request()->routeIs('home') ? 'active' : '' }}">Utama</a>
      <a href="{{ url('/') }}#mengenai">Mengapa Tak Banyak Alasan</a>
      <a href="{{ url('/') }}#kegiatan">Aktiviti Tak Banyak Alasan</a>
      <a href="{{ url('/') }}#aspirasi">Aspirasi Anda, Tekad Kami</a>
      <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}">Foto &amp; Video</a>
    </div>

    <div class="nav-btn">
      <a class="btn btn-red nav-cta" href="{{ route('bantuan.index') }}">Inisiatif Tak Banyak Alasan</a>
    </div>
  </aside>
</nav>
