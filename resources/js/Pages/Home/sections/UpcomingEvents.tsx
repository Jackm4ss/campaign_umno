import { Link } from '@inertiajs/react';
import type { CampaignEventContentData } from '../../../types';

interface Props {
    events: CampaignEventContentData[];
}

export default function UpcomingEvents({ events }: Props) {
    return (
        <section id="acara" className="acara section-pad-top">
            <div className="container">
                <div className="acara-header fade-up">
                    <span className="section-label">Acara Akan Datang</span>
                    <h2 className="section-title">ACARA AKAN DATANG</h2>
                    <p className="mengenai-text">Jadual program dan kehadiran lapangan Tak Banyak Alasan untuk warga Putrajaya.</p>
                </div>
            </div>

            <div className="acara-marquee-track" role="region" aria-label="Senarai acara akan datang">
                <div className="acara-marquee-inner">
                    {[1, 2].map((loopSet) =>
                        events.map((event) => (
                            <Link
                                key={`${loopSet}-${event.slug}`}
                                href={`/acara/${event.slug}`}
                                className="acara-card"
                                {...(loopSet === 2 ? { 'aria-hidden': true, tabIndex: -1 } : {})}
                                aria-label={`${event.title} — Detail selengkapnya`}
                            >
                                <div className="acara-card-media">
                                    <img
                                        src={event.image_url}
                                        alt={loopSet === 1 ? event.title : ''}
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
                        )),
                    )}
                </div>
            </div>
        </section>
    );
}
