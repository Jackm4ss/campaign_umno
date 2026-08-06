import { Head, Link } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';

export default function BantuanQrPage() {
    return (
        <PublicLayout>
            <Head title="QR Borang Bantuan - Tak Banyak Alasan" />
            <section className="bantuan-qr-page">
                <div className="bantuan-qr-container">
                    <div className="bantuan-qr-card">
                        <div className="bantuan-qr-header">
                            <span className="section-label">Bantuan Rakyat</span>
                            <h1 className="bantuan-qr-title">Imbas Kod QR Ini</h1>
                            <p className="bantuan-qr-subtitle">Imbas kod QR di atas untuk membuka borang bantuan di telefon anda. Borang ini disediakan oleh UMNO Putrajaya untuk warga Wilayah Persekutuan Putrajaya.</p>
                        </div>

                        <div className="bantuan-qr-image-wrap">
                            <img src="/bantuan/qr-image" alt="Kod QR Borang Bantuan" className="bantuan-qr-image" />
                            <div className="bantuan-qr-glow"></div>
                        </div>

                        <div className="bantuan-qr-instructions">
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">1</span>
                                <p>Buka kamera atau aplikasi imbasan QR pada telefon anda.</p>
                            </div>
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">2</span>
                                <p>Arahkan kepada kod QR di atas sehingga kod dikenal pasti.</p>
                            </div>
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">3</span>
                                <p>Klik pautan untuk membuka borang dan isi maklumat dengan lengkap.</p>
                            </div>
                        </div>

                        <Link href="/bantuan" className="btn btn-red btn-lg bantuan-qr-cta">
                            Buka Borang Bantuan
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                        </Link>

                        <Link href="/" className="btn btn-blue btn-lg bantuan-qr-home">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                            Back to Home
                        </Link>
                    </div>
                </div>
            </section>
        </PublicLayout>
    );
}
