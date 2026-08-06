import { Link } from '@inertiajs/react';
import { useCallback, useEffect, useRef, useState } from 'react';
import type { CampaignEventContentData } from '../../../types';

interface Props {
    events: CampaignEventContentData[];
}

export default function UpcomingEvents({ events }: Props) {
    const trackRef = useRef<HTMLDivElement>(null);
    const [canPrev, setCanPrev] = useState(false);
    const [canNext, setCanNext] = useState(false);

    const updateArrows = useCallback(() => {
        const track = trackRef.current;
        if (!track) return;

        const maxScroll = track.scrollWidth - track.clientWidth;
        setCanPrev(track.scrollLeft > 4);
        setCanNext(track.scrollLeft < maxScroll - 4);
    }, []);

    useEffect(() => {
        const track = trackRef.current;
        if (!track) return;

        updateArrows();
        track.addEventListener('scroll', updateArrows, { passive: true });
        window.addEventListener('resize', updateArrows);

        return () => {
            track.removeEventListener('scroll', updateArrows);
            window.removeEventListener('resize', updateArrows);
        };
    }, [updateArrows, events.length]);

    const scrollByCard = (direction: number) => {
        const track = trackRef.current;
        if (!track) return;

        const card = track.querySelector<HTMLElement>('.acara-card');
        const step = card ? card.offsetWidth + 16 : 316;
        track.scrollBy({ left: direction * step, behavior: 'smooth' });
    };

    return (
        <section id="acara" className="acara section-pad-top">
            <div className="container">
                <div className="acara-header fade-up">
                    <span className="section-label">Acara Akan Datang</span>
                    <h2 className="section-title">ACARA AKAN DATANG</h2>
                    <p className="mengenai-text">Jadual program dan kehadiran lapangan Tak Banyak Alasan untuk warga Putrajaya.</p>
                </div>
            </div>

            {events.length === 0 ? (
                <div className="container">
                    <div className="acara-empty">
                        <p className="acara-empty-title">Tiada acara buat masa ini.</p>
                        <p className="acara-empty-text">Nantikan pengumuman terkini di halaman ini dan media sosial kami.</p>
                    </div>
                </div>
            ) : (
                <div className="acara-carousel">
                    <div className="acara-carousel-track" ref={trackRef} role="region" aria-label="Senarai acara akan datang">
                        {events.map((event) => (
                            <Link
                                key={event.slug}
                                href={`/acara/${event.slug}`}
                                className="acara-card"
                                aria-label={`${event.title} — Detail selengkapnya`}
                            >
                                <div className="acara-card-media">
                                    <img
                                        src={event.image_url}
                                        alt={event.title}
                                        loading="lazy"
                                        className="acara-card-img"
                                    />
                                    <div className="acara-card-overlay">
                                        <span className="acara-card-cta">Detail selengkapnya</span>
                                    </div>
                                </div>
                                <div className="acara-card-meta">
                                    <span className="acara-card-date">{event.date_label}</span>
                                    <span className="acara-card-title">{event.title}</span>
                                    <span className="acara-card-place">{event.place}</span>
                                </div>
                            </Link>
                        ))}
                    </div>

                    <div className="acara-carousel-nav">
                        <button
                            type="button"
                            className="acara-carousel-arrow acara-carousel-arrow--prev"
                            aria-label="Acara sebelumnya"
                            onClick={() => scrollByCard(-1)}
                            disabled={!canPrev}
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.6" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6" /></svg>
                        </button>
                        <button
                            type="button"
                            className="acara-carousel-arrow acara-carousel-arrow--next"
                            aria-label="Acara seterusnya"
                            onClick={() => scrollByCard(1)}
                            disabled={!canNext}
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.6" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6" /></svg>
                        </button>
                    </div>
                </div>
            )}
        </section>
    );
}
