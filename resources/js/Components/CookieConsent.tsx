import { useEffect, useState } from 'react';

export default function CookieConsent() {
    const [shown, setShown] = useState(false);
    const [visible, setVisible] = useState(false);

    useEffect(() => {
        if (localStorage.getItem('cookieAccepted')) return;
        setShown(true);
        const timer = window.setTimeout(() => setVisible(true), 300);
        return () => window.clearTimeout(timer);
    }, []);

    if (!shown) return null;

    const close = () => {
        localStorage.setItem('cookieAccepted', 'true');
        setVisible(false);
        window.setTimeout(() => setShown(false), 500);
    };

    return (
        <div className={`cookie-banner${visible ? ' show' : ''}`}>
            <div className="cookie-content">
                <p>Kami menggunakan kuki untuk meningkatkan pengalaman pelayaran anda.</p>
                <div className="cookie-actions">
                    <button type="button" className="btn-cookie-reject" onClick={close}>Tolak</button>
                    <button type="button" className="btn-cookie-accept" onClick={close}>Terima Semua</button>
                </div>
            </div>
        </div>
    );
}
