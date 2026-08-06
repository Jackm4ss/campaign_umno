export default function About() {
    return (
        <section id="mengenai" className="mengenai-kami" aria-labelledby="about-heading">
            <div className="about-shell">
                <div className="about-panel">
                    <div className="about-media">
                        <p className="about-media-label">Kempen UMNO Putrajaya</p>
                        <h2 id="about-heading" className="about-media-name">
                            <span className="about-media-firstname">TAK BANYAK ALASAN</span>
                        </h2>

                        <div className="about-media-figure">
                            <img
                                loading="lazy"
                                src="/assets/tokoh.png"
                                alt="Pemimpin UMNO — Tak Banyak Alasan"
                                width={580}
                                height={510}
                                className="about-media-photo"
                            />
                        </div>

                        {/* Inside media so mobile only shades blue card; desktop spills full panel width via CSS */}
                        <div className="about-panel-shade" aria-hidden="true"></div>
                        <p className="about-media-tagline">“Hasil lebih bermakna daripada retorik — gerak kerja nyata untuk warga Putrajaya.”</p>
                    </div>

                    <div className="about-copy">
                        <p className="about-copy-eyebrow">3 Alasan Utama</p>
                        <p className="about-copy-title">Mengapa Tak Banyak Alasan</p>

                        <div className="about-points">
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">01</span>
                                <p className="about-point-text">
                                    <strong>Tindakan, Bukan Janji.</strong>
                                    Setiap program dirancang dengan objektif jelas, dilaksanakan pantas, dan memberi impak sebenar kepada masyarakat.
                                </p>
                            </div>
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">02</span>
                                <p className="about-point-text">
                                    <strong>Dekat Dengan Rakyat.</strong>
                                    Turun padang, dengar suara warga, fahami keperluan sebenar, dan sediakan penyelesaian praktikal tanpa birokrasi membebankan.
                                </p>
                            </div>
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">03</span>
                                <p className="about-point-text">
                                    <strong>Impak Yang Boleh Diukur.</strong>
                                    Kejayaan diukur melalui penerima manfaat, program berjaya, dan perubahan positif yang dirasai komuniti — bukan publisiti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}
