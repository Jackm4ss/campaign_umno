import { useState } from 'react';
import LegalModal, { type LegalDocument } from './LegalModal';
import { baseUrl, subdomainUrl } from '../lib/url';

export default function Footer() {
    const [legalDocument, setLegalDocument] = useState<LegalDocument | null>(null);

    return (
        <>
        <footer className="footer">
            <div className="footer-stripes">
                <div className="stripe-red"></div>
                <div className="stripe-white"></div>
                <div className="stripe-blue"></div>
            </div>
            <img loading="lazy" src="/assets/admin-logo-blue.png" className="footer-watermark-img" alt="" />
            <div className="container footer-content">
                <div className="footer-grid">
                    <div className="footer-brand">
                        <div className="footer-brand-logo">
                            <img loading="lazy" src="/assets/admin-logo-blue.png" className="logo-text" alt="Tak Banyak Alasan" />
                        </div>
                        <p className="footer-desc">Gerakan komuniti Tak Banyak Alasan untuk warga Putrajaya.</p>
                        <p className="footer-tagline">Terbukti, Terlihat &amp; Terjamin<br />Proven, Seen &amp; Guaranteed</p>
                        <div className="footer-contact">
                            <p><a href="mailto:info@takbanyakalasan.com">info@takbanyakalasan.com</a></p>
                        </div>
                    </div>
                    <div className="footer-col">
                        <h2 className="footer-title">Pautan</h2>
                        <div className="footer-links">
                            <a href={baseUrl('/#mengenai')}>Tentang Kami</a>
                            <a href={baseUrl('/#aktiviti')}>Aktiviti Kami</a>
                            <a href={baseUrl('/galeri')}>Foto Galeri</a>
                            <a href={subdomainUrl('bantuan')}>Borang Bantuan</a>
                            <a href={subdomainUrl('aspirasi')}>Aspirasi Anda, Tekad Kami</a>
                        </div>
                    </div>
                    <div className="footer-col">
                        <h2 className="footer-title">Sosial Media Tak Banyak Alasan</h2>
                        <div className="footer-links">
                            <a href="https://www.facebook.com/share/1BQW3xB3wE/?mibextid=wwXIfr" target="_blank" rel="noopener">Facebook</a>
                            <a href="https://www.instagram.com/takbanyakalasan?utm_source=qr" target="_blank" rel="noopener">Instagram</a>
                            <a href="https://www.threads.com/@takbanyakalasan" target="_blank" rel="noopener">Threads</a>
                        </div>
                    </div>
                </div>
                <div className="footer-bottom">
                    <div className="footer-copy">&copy; {new Date().getFullYear()} TAK BANYAK ALASAN</div>
                    <div className="footer-legal">
                        <button type="button" className="footer-legal-button" onClick={() => setLegalDocument('terms')}>Terma &amp; Syarat</button>
                        <span aria-hidden="true">•</span>
                        <button type="button" className="footer-legal-button" onClick={() => setLegalDocument('privacy')}>Dasar Privasi</button>
                        <span aria-hidden="true">•</span>
                        <a href={baseUrl('/admin')}>Admin</a>
                    </div>
                    <div className="footer-country">
                        <span className="country-dot">
                            <img
                                loading="lazy"
                                src="/assets/flag-of-malaysia.png"
                                width={28}
                                height={18}
                                alt="Bendera Malaysia"
                                style={{ display: 'block', borderRadius: '2px' }}
                            />
                        </span>
                        Malaysia
                    </div>
                </div>
            </div>
        </footer>
        <LegalModal document={legalDocument} onClose={() => setLegalDocument(null)} />
        </>
    );
}
