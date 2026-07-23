  </script>  <form id="admin-logout-form" method="POST" action="{{ route('admin.logout') }}" style="display:none;">@csrf</form>
  <header class="adm-topbar">
    <div class="adm-nav-inner">
      <a class="adm-brand" href="#" aria-label="Admin Tak Banyak Alasan">
        <img src="assets/admin-logo-blue.png" alt="Tak Banyak Alasan" style="height:36px;width:auto;border-radius:0;">
      </a>

      <nav class="adm-nav adm-desktop" aria-label="Navigasi admin">
        <a class="adm-link active" href="#" data-adm-section="overview">Overview</a>
        <a class="adm-link" href="#" data-adm-section="members">Data Ahli</a>
        <a class="adm-link" href="#" data-adm-section="events">Events</a>
        <a class="adm-link" href="#" data-adm-section="articles">Artikel</a>
        <a class="adm-link" href="#" data-adm-section="content">CMS Frontpage</a>
        <a class="adm-link" href="#" data-adm-section="account">Akun Admin</a>
        <a class="adm-link" href="#" data-adm-section="settings">Tetapan</a>
      </nav>

      <button class="adm-menu-btn" id="admMenuToggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <button class="adm-logout" type="button" onclick="document.getElementById('admin-logout-form').submit()">Log Keluar</button>
    </div>

    <nav class="adm-mobile" id="admMobileMenu" aria-label="Navigasi mobile">
      <a class="adm-link active" href="#" data-adm-section="overview">Overview</a>
      <a class="adm-link" href="#" data-adm-section="members">Data Ahli</a>
      <a class="adm-link" href="#" data-adm-section="events">Events</a>
      <a class="adm-link" href="#" data-adm-section="articles">Artikel</a>
      <a class="adm-link" href="#" data-adm-section="content">CMS Frontpage</a>
      <a class="adm-link" href="#" data-adm-section="account">Akun Admin</a>
      <a class="adm-link" href="#" data-adm-section="settings">Tetapan</a>
      <button class="adm-mobile-logout" type="button" onclick="document.getElementById('admin-logout-form').submit()">Log Keluar</button>
    </nav>
  </header>
