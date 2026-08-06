import { Head } from '@inertiajs/react';
import { useEffect, useMemo, useState } from 'react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { GalleryItemData, GalleryPageProps } from '../../types';

const categoryMeta: Record<string, string> = {
    all: 'Semua',
    kegiatan: 'Kegiatan',
    komuniti: 'Komuniti',
    kepimpinan: 'Kepimpinan',
    media: 'Media',
};

export default function GalleryIndex({ gallery }: GalleryPageProps) {
    const items = gallery ?? [];
    const initialFilter = (() => {
        const param = new URLSearchParams(window.location.search).get('filter');
        return param && param in categoryMeta ? param : 'all';
    })();

    const [filter, setFilter] = useState(initialFilter);
    const [activeIndex, setActiveIndex] = useState(-1);

    const visibleItems = useMemo(
        () => items.filter((item) => filter === 'all' || item.category === filter),
        [items, filter],
    );

    const videoCount = items.filter((item) => item.url).length;

    const applyFilter = (category: string) => {
        setFilter(category);
        const url = new URL(window.location.href);
        if (category === 'all') {
            url.searchParams.delete('filter');
        } else {
            url.searchParams.set('filter', category);
        }
        window.history.replaceState(null, '', url.toString());
    };

    const lightboxOpen = activeIndex >= 0;
    const current = lightboxOpen ? visibleItems[activeIndex] : null;

    const closeLightbox = () => setActiveIndex(-1);
    const step = (delta: number) => {
        if (visibleItems.length < 2 || activeIndex < 0) return;
        setActiveIndex((activeIndex + delta + visibleItems.length) % visibleItems.length);
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
    }, [lightboxOpen, activeIndex, visibleItems.length]);

    return (
        <PublicLayout>
            <Head title="Galeri Kempen - Tak Banyak Alasan" />
            <a href="#galeri" className="skip-link">Langkau ke kandungan galeri</a>

            <section id="galeri" className="ig-galeri" aria-labelledby="ig-galeri-title">
                <div className="ig-shell">
                    <a href="/" className="ig-back">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                        <span>back</span>
                    </a>

                    {/* Profile header */}
                    <header className="ig-profile">
                        <div className="ig-profile-avatar" aria-hidden="true">
                            <img src="/assets/admin-logo-blue.png" alt="" width={120} height={120} loading="eager" />
                        </div>
                        <div className="ig-profile-meta">
                            <div className="ig-profile-row">
                                <h1 id="ig-galeri-title" className="ig-handle" translate="no">umno.putrajaya</h1>
                                <span className="ig-badge">Galeri</span>
                            </div>
                            <ul className="ig-stats" aria-label="Statistik galeri">
                                <li><strong>{items.length}</strong> <span>catatan</span></li>
                                <li><strong>{videoCount}</strong> <span>video</span></li>
                                <li><strong>{Math.max(0, items.length - videoCount)}</strong> <span>foto</span></li>
                            </ul>
                            <div className="ig-bio">
                                <p className="ig-bio-name">Tak Banyak Alasan</p>
                                <p className="ig-bio-text">Dokumentasi visual kempen UMNO Putrajaya — kegiatan, komuniti, kepimpinan & media.</p>
                            </div>
                        </div>
                    </header>

                    {/* Category chips */}
                    <div className="ig-filters" role="tablist" aria-label="Tapis galeri">
                        {Object.entries(categoryMeta).map(([key, label]) => (
                            <button
                                key={key}
                                type="button"
                                className={`ig-chip${filter === key ? ' is-active' : ''}`}
                                data-filter={key}
                                role="tab"
                                aria-selected={filter === key}
                                onClick={() => applyFilter(key)}
                            >{label}</button>
                        ))}
                    </div>

                    {/* Dense square grid */}
                    <div className="ig-grid" id="galeri-grid" role="list">
                        {items.length === 0 ? (
                            <p className="ig-empty-full">Belum ada dokumentasi untuk dipaparkan.</p>
                        ) : (
                            visibleItems.map((item: GalleryItemData) => {
                                const isVideo = Boolean(item.url);
                                const index = visibleItems.indexOf(item);
                                return (
                                    <button
                                        key={`${item.id}-${index}`}
                                        type="button"
                                        className={`ig-cell${isVideo ? ' ig-cell--video' : ''}`}
                                        role="listitem"
                                        data-category={item.category}
                                        aria-label={`Buka ${item.title}`}
                                        onClick={() => setActiveIndex(index)}
                                    >
                                        <img loading="lazy" decoding="async" src={item.src} alt={item.title} width={400} height={400} />
                                        <span className="ig-cell-shade" aria-hidden="true"></span>
                                        {isVideo ? (
                                            <span className="ig-cell-video" aria-hidden="true">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z" /></svg>
                                            </span>
                                        ) : null}
                                        <span className="ig-cell-hover">
                                            <span className="ig-cell-title">{item.title}</span>
                                        </span>
                                    </button>
                                );
                            })
                        )}
                    </div>

                    <p className="ig-empty" hidden={visibleItems.length > 0 || items.length === 0}>Tiada catatan untuk penapis ini.</p>
                </div>
            </section>

            {/* Instagram-style lightbox */}
            {!lightboxOpen || !current ? null : (
                <div className="ig-lightbox">
                    <div className="ig-lightbox-scrim" onClick={closeLightbox}></div>

                    {visibleItems.length > 1 ? (
                        <>
                            <button type="button" className="ig-lightbox-nav ig-lightbox-prev" aria-label="Catatan sebelumnya" onClick={() => step(-1)}>
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
