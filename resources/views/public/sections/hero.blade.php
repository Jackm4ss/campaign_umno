<section class="hero" id="utama">
    <div class="hero-bg">
        <img src="{{ asset('assets/collage-bg.jpg') }}" alt="UMNO Activities Collage" class="hero-bg-collage">
        <div class="hero-bg-overlay"></div>
    </div>

    <div class="hero-right">
        <img src="{{ asset('assets/tokoh.png') }}" alt="Pemimpin UMNO" class="hero-tokoh" id="heroTokoh">
    </div>

    <div class="hero-content">
        <div class="hero-left">
            <img src="{{ asset('assets/logo-tba.png') }}" alt="Tak Banyak Alasan" class="hero-logo" id="heroLogo">
            <p class="hero-tagline">Terbukti, Terlihat &amp; Terjamin<br>Proven, Seen &amp; Guaranteed</p>
            <div class="hero-buttons">
                <a href="{{ route('bantuan.index') }}" class="hero-btn hero-btn-primary">
                    <span>Aspirasi Anda, Tekad Kami</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('bantuan.index') }}" class="hero-btn hero-btn-outline">
                    <span>Inisiatif Tak Banyak Alasan</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
        <div class="hero-scroll-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
    </div>
</section>
