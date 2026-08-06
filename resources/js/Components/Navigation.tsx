import { Link, usePage } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import { baseUrl } from '../lib/url';

export default function Navigation() {
    const [open, setOpen] = useState(false);
    const [scrolled, setScrolled] = useState(false);
    const url = usePage().url;

    useEffect(() => {
        const onScroll = () => {
            if (!open) {
                setScrolled(window.scrollY > 50);
            }
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
        return () => window.removeEventListener('scroll', onScroll);
    }, [open]);

    useEffect(() => {
        if (!open) return;

        const onClick = (event: MouseEvent) => {
            const target = event.target;
            if (!(target instanceof Node)) return;
            const menu = document.getElementById('main-menu');
            const button = document.getElementById('mobile-menu');
            if (menu?.contains(target) || button?.contains(target)) return;
            setOpen(false);
        };
        const onKey = (event: KeyboardEvent) => {
            if (event.key === 'Escape') setOpen(false);
        };

        document.addEventListener('click', onClick);
        document.addEventListener('keydown', onKey);
        document.body.classList.add('nav-open');

        return () => {
            document.removeEventListener('click', onClick);
            document.removeEventListener('keydown', onKey);
            document.body.classList.remove('nav-open');
        };
    }, [open]);

    const close = () => setOpen(false);

    return (
        <>
            <nav className={`navbar${scrolled ? ' scrolled' : ''}`} aria-label="Navigasi utama">
                <div className="container nav-bar-inner">
                    <a className="nav-logo" href={baseUrl('/#utama')} aria-label="Tak Banyak Alasan">
                        <img src="/assets/admin-logo-blue.png" alt="Tak Banyak Alasan" />
                    </a>

                    <button
                        className={`menu-toggle${open ? ' active' : ''}`}
                        id="mobile-menu"
                        type="button"
                        aria-label={open ? 'Tutup menu' : 'Buka menu'}
                        aria-controls="main-menu"
                        aria-expanded={open}
                        onClick={(event) => {
                            event.stopPropagation();
                            setOpen(!open);
                        }}
                    >
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </nav>

            {/* Overlay + drawer MUST sit outside .navbar: navbar uses transform, which traps fixed children */}
            <div
                className={`nav-overlay${open ? ' is-open' : ''}`}
                id="nav-overlay"
                hidden={!open}
                aria-hidden={!open}
                onClick={close}
            ></div>

            <aside className={`nav-menu${open ? ' active' : ''}`} id="main-menu" aria-label="Menu sisi">
                <div className="nav-drawer-head">
                    <div className="nav-drawer-brand">
                        <img src="/assets/admin-logo-blue.png" alt="Tak Banyak Alasan" className="nav-drawer-logo" />
                    </div>
                    <button className="nav-close" id="nav-close" type="button" aria-label="Tutup menu" onClick={close}>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div className="nav-links">
                    <a href={baseUrl('/#utama')} className={url === '/' ? 'active' : ''} onClick={close}>Utama</a>
                    <a href={baseUrl('/#mengenai')} onClick={close}>Mengapa Tak Banyak Alasan</a>
                    <a href={baseUrl('/#kegiatan')} onClick={close}>Aktiviti Tak Banyak Alasan</a>
                    <a href={baseUrl('/#sertai')} onClick={close}>Aspirasi Anda, Tekad Kami</a>
                    <a href={baseUrl('/galeri')} className={url.startsWith('/galeri') ? 'active' : ''} onClick={close}>Foto &amp; Video</a>
                </div>

                <div className="nav-btn">
                    <a className="btn btn-red nav-cta" href={baseUrl('/bantuan')} onClick={close}>Inisiatif Tak Banyak Alasan</a>
                </div>
            </aside>
        </>
    );
}
