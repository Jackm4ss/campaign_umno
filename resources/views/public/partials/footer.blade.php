<footer class="footer">
  <div class="footer-stripes"><div class="stripe-red"></div><div class="stripe-white"></div><div class="stripe-blue"></div></div>
  <img loading="lazy" src="{{ asset('assets/admin-logo-blue.png') }}" class="footer-watermark-img" alt="">
  <div class="container footer-content"><div class="footer-grid">
    <div class="footer-brand"><div class="footer-brand-logo"><img loading="lazy" src="{{ asset('assets/admin-logo-blue.png') }}" class="logo-text" alt="Tak Banyak Alasan"></div><p class="footer-desc">{{ $settings['orgDesc'] ?? 'Kempen UMNO Putrajaya melalui Tak Banyak Alasan.' }}</p><div class="footer-contact"><p>{{ $settings['address'] ?? 'Presint 9, Putrajaya, WP Malaysia' }}</p><p>{{ $settings['contact'] ?? 'info@takbanyakalasan.org.my' }}</p><p>{{ $settings['phone'] ?? '+603-8888 XXXX' }}</p></div></div>
    <div class="footer-col"><h2 class="footer-title">Kempen</h2><div class="footer-links"><a href="#mengenai">Mengenai Kami</a><a href="#pimpinan">Pimpinan</a><a href="{{ route('bantuan.index') }}">Borang Bantuan</a><a href="#sertai">Sertai Gerakan</a></div></div>
    <div class="footer-col"><h2 class="footer-title">Gerak Kerja</h2><div class="footer-links"><a href="#kegiatan">Kegiatan</a><a href="#aspirasi">Aspirasi Warga</a><a href="#artikel">Media &amp; Berita</a></div></div>
  </div><div class="footer-bottom"><div class="footer-copy">&copy; {{ $settings['copyrightYear'] ?? date('Y') }} TAK BANYAK ALASAN</div><div class="footer-legal"><a href="{{ url('/admin/login') }}">Admin</a></div><div class="footer-country"><span class="country-dot"></span> Malaysia</div></div></div>
</footer>
