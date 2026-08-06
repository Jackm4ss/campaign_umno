import { useEffect, useState } from 'react';

export default function BackToTop() {
    const [visible, setVisible] = useState(false);

    useEffect(() => {
        const hero = document.querySelector('.hero, #utama');
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const threshold = () => {
            if (hero instanceof HTMLElement) {
                return Math.max(280, hero.offsetHeight * 0.85);
            }
            return Math.max(400, window.innerHeight * 0.5);
        };

        const update = () => {
            setVisible(window.scrollY > threshold());
        };

        update();
        window.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update, { passive: true });
        return () => {
            window.removeEventListener('scroll', update);
            window.removeEventListener('resize', update);
        };
    }, []);

    const scrollTop = () => {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    };

    return (
        <button
            type="button"
            className={`back-to-top${visible ? ' is-visible' : ''}`}
            id="back-to-top"
            aria-label="Kembali ke atas"
            aria-hidden={!visible}
            hidden={!visible}
            onClick={scrollTop}
        >
            <span className="back-to-top-btn" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                    <polyline points="18 15 12 9 6 15" />
                </svg>
            </span>
        </button>
    );
}
