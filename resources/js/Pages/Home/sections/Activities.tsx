const carouselImgs = [
    'assets/carousel/umno-gotong-royong-kerja.jpg',
    'assets/carousel/umno-gotong-royong-kumpulan.jpg',
    'assets/carousel/umno-gotong-royong-putraharmoni.jpg',
    'assets/carousel/umno-gotong-royong-surau.jpg',
    'assets/carousel/tba-inisiatif-warga-2024.jpg',
    'assets/carousel/tba-pek-makanan-ramadan-2025.jpg',
    'assets/carousel/aspirasi-warga-putrajaya-1.jpg',
    'assets/carousel/aspirasi-warga-putrajaya-2.jpg',
    'assets/carousel/aspirasi-warga-putrajaya-3.jpg',
    'assets/carousel/umno-pemuda-pek-makanan-2025.jpg',
    'assets/carousel/umno-ziarah-prihatin-2025.jpg',
    'assets/carousel/adnan-khidmat-2024.jpg',
];

export default function Activities() {
    return (
        <section id="kegiatan" className="kegiatan">
            <div className="container">
                <div className="kegiatan-header fade-up">
                    <span className="section-label">Jom Sertai Kami</span>
                    <h2 className="section-title">JOM SERTAI TAK BANYAK ALASAN</h2>
                    <p className="mengenai-text">Program kempen dan komuniti UMNO Putrajaya yang dekat dengan rakyat.</p>
                </div>
            </div>

            {/* Infinite photo marquee */}
            <div className="marquee-track" aria-hidden="true">
                <div className="marquee-inner">
                    {/* First set */}
                    {carouselImgs.map((src, i) => (
                        <div className="marquee-item" key={`a-${src}`}>
                            <img src={`/${src}`} alt={`Kegiatan Tak Banyak Alasan ${i + 1}`} loading="lazy" />
                        </div>
                    ))}

                    {/* Duplicate for seamless loop */}
                    {carouselImgs.map((src) => (
                        <div className="marquee-item" aria-hidden="true" key={`b-${src}`}>
                            <img src={`/${src}`} alt="" loading="lazy" />
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}
