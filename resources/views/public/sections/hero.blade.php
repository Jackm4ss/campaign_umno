<section class="hero" id="utama">
    <div class="hero-bg">
        <img src="{{ asset('assets/collage-bg.jpg') }}" alt="UMNO Activities Collage" class="hero-bg-collage">
        <div class="hero-bg-overlay"></div>
    </div>

    <div class="hero-content">
        <div class="hero-left">
            <img src="{{ asset('assets/logo-tba.png') }}" alt="Tak Banyak Alasan" class="hero-logo" id="heroLogo">
            <p class="hero-tagline">Bersama Membina Putrajaya<br>Demi Rakyat, Bersama UMNO.</p>
            <div class="hero-buttons">
                <a href="#sertai" class="hero-btn hero-btn-primary">
                    <span>JOIN OUR MOVEMENT</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('bantuan.index') }}" class="hero-btn hero-btn-outline">
                    <span>BORANG BANTUAN</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="hero-right">
        <img src="{{ asset('assets/tokoh.png') }}" alt="Pemimpin UMNO" class="hero-tokoh" id="heroTokoh">
    </div>

    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="hero-scroll-line"></div>
    </div>
</section>
