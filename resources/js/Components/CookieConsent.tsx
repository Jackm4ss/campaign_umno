import { useEffect, useState } from 'react';
import LegalModal from './LegalModal';

const CONSENT_KEY = 'tba_cookie_consent_v2';

export default function CookieConsent() {
    const [shown, setShown] = useState(false);
    const [visible, setVisible] = useState(false);
    const [privacyOpen, setPrivacyOpen] = useState(false);

    useEffect(() => {
        try {
            if (localStorage.getItem(CONSENT_KEY)) return;
        } catch {
            // The banner remains available when storage is blocked by the browser.
        }

        setShown(true);
        const timer = window.setTimeout(() => setVisible(true), 300);
        return () => window.clearTimeout(timer);
    }, []);

    const close = (decision: 'accepted' | 'rejected') => {
        try {
            localStorage.setItem(CONSENT_KEY, decision);
        } catch {
            // Closing the banner should still work when storage is unavailable.
        }

        setVisible(false);
        window.setTimeout(() => setShown(false), 500);
    };

    return (
        <>
            {shown ? (
                <div className={`cookie-banner${visible ? ' show' : ''}`} role="region" aria-label="Pilihan cookies">
                    <div className="cookie-content">
                        <p>
                            Kami menggunakan cookies untuk memastikan laman berfungsi dengan baik dan meningkatkan pengalaman anda.{' '}
                            <button type="button" className="cookie-privacy-link" onClick={() => setPrivacyOpen(true)}>Baca Dasar Privasi</button>.
                        </p>
                        <div className="cookie-actions">
                            <button type="button" className="btn-cookie-reject" onClick={() => close('rejected')}>Tolak</button>
                            <button type="button" className="btn-cookie-accept" onClick={() => close('accepted')}>Terima Semua Cookies</button>
                        </div>
                    </div>
                </div>
            ) : null}

            <LegalModal document={privacyOpen ? 'privacy' : null} onClose={() => setPrivacyOpen(false)} />
        </>
    );
}
