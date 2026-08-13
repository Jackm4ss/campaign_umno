import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import { baseUrl } from '../../lib/url';

export default function AspirasiQrPage() {
    return (
        <PublicLayout>
            <Head title="QR Borang Aspirasi - Tak Banyak Alasan" />
            <section className="bantuan-qr-page">
                <div className="bantuan-qr-container">
                    <div className="bantuan-qr-card">
                        <div className="bantuan-qr-header">
                            <h1 className="bantuan-qr-title">Imbas Kod QR Aspirasi</h1>
                            <p className="bantuan-qr-subtitle">Imbas kod QR di bawah untuk membuka borang aspirasi di telefon anda dan kongsikan suara anda untuk masa depan Putrajaya yang lebih baik.</p>
                        </div>

                        <div className="bantuan-qr-image-wrap">
                            <img src={baseUrl('/aspirasi/qr-image')} alt="Kod QR Borang Aspirasi" className="bantuan-qr-image" />
                            <div className="bantuan-qr-glow"></div>
                        </div>

                        <div className="bantuan-qr-instructions">
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">1</span>
                                <p>Buka kamera atau aplikasi imbasan QR pada telefon anda.</p>
                            </div>
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">2</span>
                                <p>Arahkan kamera kepada kod QR sehingga pautan dikenal pasti.</p>
                            </div>
                            <div className="bantuan-qr-step">
                                <span className="bantuan-qr-step-number">3</span>
                                <p>Buka pautan dan lengkapkan borang aspirasi anda.</p>
                            </div>
                        </div>

                        <a href={baseUrl('/aspirasi')} className="btn btn-red btn-lg bantuan-qr-cta">
                            Buka Borang Aspirasi
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                        </a>

                        <a href={baseUrl('/')} className="btn btn-blue btn-lg bantuan-qr-home">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                            Kembali ke Laman Utama
                        </a>
                    </div>
                </div>
            </section>
        </PublicLayout>
    );
}
