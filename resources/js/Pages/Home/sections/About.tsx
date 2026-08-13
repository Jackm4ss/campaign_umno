export default function About() {
    return (
        <section id="mengenai" className="mengenai-kami" aria-labelledby="about-heading">
            <div className="about-shell">
                <div className="about-panel">
                    <div className="about-media">
                        <h2 id="about-heading" className="about-media-name">
                            <img
                                src="/assets/logo-tba.png"
                                alt="Tak Banyak Alasan"
                                className="about-media-logo"
                            />
                        </h2>

                        <div className="about-media-figure">
                            <img
                                loading="lazy"
                                src="/assets/tokoh.png"
                                alt="Tokoh Tak Banyak Alasan"
                                width={580}
                                height={510}
                                className="about-media-photo"
                            />
                        </div>

                    </div>

                    <div className="about-copy">
                        <p className="about-copy-title">Mengapa Tak Banyak Alasan</p>

                        <div className="about-points">
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">01</span>
                                <p className="about-point-text">
                                    <strong>Tindakan, Bukan Janji.</strong>{' '}
                                    Kami percaya hasil lebih bermakna daripada retorik. Setiap program dirancang dengan objektif yang jelas, dilaksanakan dengan pantas, dan memberi impak sebenar kepada masyarakat.
                                </p>
                            </div>
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">02</span>
                                <p className="about-point-text">
                                    <strong>Dekat Dengan Rakyat.</strong>{' '}
                                    Kami turun padang, mendengar sendiri suara rakyat, memahami keperluan sebenar, dan menyediakan penyelesaian yang praktikal tanpa birokrasi yang menyusahkan.
                                </p>
                            </div>
                            <div className="about-point">
                                <span className="about-point-num" aria-hidden="true">03</span>
                                <p className="about-point-text">
                                    <strong>Impak Yang Boleh Diukur.</strong>{' '}
                                    Kejayaan bukan diukur melalui publisiti, tetapi melalui jumlah penerima manfaat, program yang berjaya dilaksanakan, dan perubahan positif yang dirasai oleh komuniti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}
