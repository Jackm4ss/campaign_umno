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
                            <a href="/galeri" className="marquee-item" key={`a-${item.id}`} title={item.title}>
                                <img src={item.src} alt={`Kegiatan Tak Banyak Alasan ${i + 1}`} loading="lazy" />
                            </a>
                        ))}

                        {/* Duplicate for seamless loop only when there are enough items */}
                        {items.length >= 6 ? items.map((item) => (
                            <a href="/galeri" className="marquee-item" aria-hidden="true" tabIndex={-1} key={`b-${item.id}`}>
                                <img src={item.src} alt="" loading="lazy" />
                            </a>
                        )) : null}
                    </div>
                </div>
            )}
        </section>
    );
}
