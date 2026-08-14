import type { GalleryItemData } from '../../../types';

interface Props {
    gallery: GalleryItemData[];
}

const MAX_ITEMS = 12;

export default function Activities({ gallery }: Props) {
    const items = (gallery ?? []).slice(0, MAX_ITEMS);

    return (
        <section id="kegiatan" className="kegiatan">
            <div className="container">
                <div className="kegiatan-header fade-up">
                    <span className="section-label">Jom Sertai Kami</span>
                    <h2 className="section-title">JOM SERTAI TAK BANYAK ALASAN</h2>
                    <p className="mengenai-text">Program kempen dan komuniti UMNO Putrajaya yang dekat dengan rakyat.</p>
                </div>
            </div>

            {items.length === 0 ? (
                <div className="container">
                    <p className="kegiatan-empty">Belum ada dokumentasi kegiatan untuk dipaparkan.</p>
                </div>
            ) : (
                <div className="marquee-track" aria-label="Dokumentasi kegiatan">
                    <div className={`marquee-inner${items.length < 6 ? ' marquee-inner--few' : ''}`}>
                        {/* First set */}
                        {items.map((item, i) => (
                            <a href="/galeri"
                                className={`marquee-item${item.type !== 'photo' && !item.src ? ' marquee-item--video-no-thumb' : ''}`}
                                key={`a-${item.id}`} title={item.title}>
                                {item.src && <img src={item.src} alt={`Kegiatan Tak Banyak Alasan ${i + 1}`} loading="lazy" />}
                                {item.type !== 'photo' && (
                                    <span className="galeri-play-overlay" aria-hidden="true">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="23" fill="rgba(0,0,0,0.55)" stroke="#fff" strokeWidth="2"/><polygon points="19,14 19,34 36,24" fill="#fff"/></svg>
                                    </span>
                                )}
                            </a>
                        ))}

                        {/* Duplicate for seamless loop only when there are enough items */}
                        {items.length >= 6 ? items.map((item) => (
                            <a href="/galeri"
                                className={`marquee-item${item.type !== 'photo' && !item.src ? ' marquee-item--video-no-thumb' : ''}`}
                                aria-hidden="true" tabIndex={-1} key={`b-${item.id}`}>
                                {item.src && <img src={item.src} alt="" loading="lazy" />}
                                {item.type !== 'photo' && (
                                    <span className="galeri-play-overlay" aria-hidden="true">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="23" fill="rgba(0,0,0,0.55)" stroke="#fff" strokeWidth="2"/><polygon points="19,14 19,34 36,24" fill="#fff"/></svg>
                                    </span>
                                )}
                            </a>
                        )) : null}
                    </div>
                </div>
            )}
        </section>
    );
}
