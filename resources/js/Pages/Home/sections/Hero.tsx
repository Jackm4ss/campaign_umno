export default function Hero() {
    return (
        <section className="hero" id="utama">
            <div className="hero-bg">
                <img src="/assets/collage-bg.jpg" alt="UMNO Activities Collage" className="hero-bg-collage" />
                <div className="hero-bg-overlay"></div>
            </div>

            <div className="hero-right">
                <img src="/assets/tokoh.png" alt="Pemimpin UMNO" className="hero-tokoh" id="heroTokoh" />
            </div>

            <div className="hero-content">
                <div className="hero-left">
                    <img src="/assets/logo-tba.png" alt="Tak Banyak Alasan" className="hero-logo" id="heroLogo" />
                    <p className="hero-tagline">Terbukti, Terlihat &amp; Terjamin<br />Proven, Seen &amp; Guaranteed</p>
                    <div className="hero-buttons">
                        <a href="/bantuan" className="hero-btn hero-btn-primary">
                            <span>Inisiatif Tak Banyak Alasan</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                        </a>
                        <a href="/#sertai" className="hero-btn hero-btn-outline">
                            <span>Aspirasi Anda, Tekad Kami</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                        </a>
                    </div>
                </div>
            </div>

            <a href="#mengenai" className="hero-scroll" aria-label="Ke bahagian seterusnya">
                <span className="hero-scroll-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9" /></svg>
                </span>
            </a>
        </section>
    );
}
