import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { GalleryItemData, GalleryPageProps } from '../../types';

export default function GalleryIndex({ gallery }: GalleryPageProps) {
    const items = gallery ?? [];
    const [activeIndex, setActiveIndex] = useState(-1);

    const lightboxOpen = activeIndex >= 0;
    const current = lightboxOpen ? items[activeIndex] : null;

    const closeLightbox = () => setActiveIndex(-1);
    const step = (delta: number) => {
        if (items.length < 2 || activeIndex < 0) return;
        setActiveIndex((activeIndex + delta + items.length) % items.length);
    };

    useEffect(() => {
        if (!lightboxOpen) return;

        document.body.classList.add('galeri-lightbox-open');
        const onKey = (event: KeyboardEvent) => {
            if (event.key === 'Escape') {
                setActiveIndex(-1);
            } else if (event.key === 'ArrowLeft') {
                event.preventDefault();
                step(-1);
            } else if (event.key === 'ArrowRight') {
                event.preventDefault();
                step(1);
            }
        };
        document.addEventListener('keydown', onKey);

        return () => {
            document.body.classList.remove('galeri-lightbox-open');
            document.removeEventListener('keydown', onKey);
        };
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [lightboxOpen, activeIndex, items.length]);

    return (
        <PublicLayout>
            <Head title="Foto Galeri - Tak Banyak Alasan" />

            <section className="kegiatan galeri-page">
                <div className="container">
                    <div className="kegiatan-header fade-up">
                        <h2 className="section-title">JOM SERTAI TAK BANYAK ALASAN</h2>
                        <p className="mengenai-text">Terbukti, Terlihat &amp; Terjamin — Proven, Seen &amp; Guaranteed</p>
                    </div>
                </div>

                {items.length === 0 ? (
                    <div className="container">
                        <p className="kegiatan-empty">Galeri sedang dikemaskini. Nantikan dokumentasi kegiatan kami tidak lama lagi.</p>
                    </div>
                ) : (
                    <div className="marquee-track" aria-label="Dokumentasi kegiatan">
                        <div className={`marquee-inner${items.length < 6 ? ' marquee-inner--few' : ''}`}>
                            {items.map((item, i) => (
                                <button type="button" className="marquee-item" key={`a-${item.id}`}
                                    title={item.title} onClick={() => setActiveIndex(i)}>
                                    <img src={item.src} alt={item.title} loading="lazy" />
                                </button>
                            ))}
                            {items.length >= 6 ? items.map((item, i) => (
                                <button type="button" className="marquee-item" aria-hidden="true"
                                    tabIndex={-1} key={`b-${item.id}`}
                                    onClick={() => setActiveIndex(i)}>
                                    <img src={item.src} alt="" loading="lazy" />
                                </button>
                            )) : null}
                        </div>
                    </div>
                )}
            </section>

            {/* Lightbox */}
            {!lightboxOpen || !current ? null : (
                <div className="ig-lightbox">
                    <div className="ig-lightbox-scrim" onClick={closeLightbox}></div>

                    {items.length > 1 ? (
                        <>
                            <button type="button" className="ig-lightbox-nav ig-lightbox-prev" aria-label="Catatan terdahulu" onClick={() => step(-1)}>
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.4" aria-hidden="true"><path d="M15 18l-6-6 6-6" /></svg>
                            </button>
                            <button type="button" className="ig-lightbox-nav ig-lightbox-next" aria-label="Catatan seterusnya" onClick={() => step(1)}>
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.4" aria-hidden="true"><path d="M9 18l6-6-6-6" /></svg>
                            </button>
                        </>
                    ) : null}

                    <div className="ig-lightbox-stage" role="dialog" aria-modal="true" aria-label={current.title}>
                        <button type="button" className="ig-lightbox-close" aria-label="Tutup" onClick={closeLightbox}>
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.4" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" /></svg>
                        </button>

                        <div className="ig-lightbox-frame ig-lightbox-frame--media-only">
                            <div className="ig-lightbox-media">
                                <img src={current.src} alt={current.title} />
                            </div>

                            {current.url ? (
                                <a className="ig-lightbox-watch" href={current.url} target="_blank" rel="noopener noreferrer">
                                    Tonton di {current.label || 'platform'} &rarr;
                                </a>
                            ) : null}
                        </div>
                    </div>
                </div>
            )}
        </PublicLayout>
    );
}
