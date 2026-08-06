import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { EventShowProps } from '../../types';

function resolveHref(href: string, listAnchor: string): string {
    if (href === 'bantuan') return '/bantuan';
    if (href === listAnchor) return '/#acara';

    return `/#${href}`;
}

export default function EventShow({ event, siblings }: EventShowProps) {
    const primaryCta = event.cta?.primary;
    const secondaryCta = event.cta?.secondary;

    return (
        <PublicLayout>
            <Head title={`${event.title} - Tak Banyak Alasan`} />
            <section className="event-detail-page section-pad">
                <div className="container event-detail-container">
                    <div className="event-detail-shell">
                        <a href="/#acara" className="event-detail-back" title="Kembali ke senarai acara">
                            <span className="event-detail-back-pad">
                                <svg className="event-detail-back-fillet event-detail-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                                <span className="event-detail-back-circle">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                                </span>
                                <svg className="event-detail-back-fillet event-detail-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                            </span>
                        </a>

                        <article className="event-detail-card">
                            <header className="event-detail-header">
                                <span className="section-label">Acara Akan Datang</span>
                                <h1 className="section-title event-detail-title">{event.title}</h1>
                                <div className="event-detail-meta">
                                    <span className="event-detail-meta-item">
                                        <strong>Tarikh</strong> {event.date_label}
                                    </span>
                                    <span className="event-detail-meta-sep" aria-hidden="true">·</span>
                                    <span className="event-detail-meta-item">
                                        <strong>Lokasi</strong> {event.place}
                                    </span>
                                </div>
                                <div className="event-detail-lead" dangerouslySetInnerHTML={{ __html: event.lead }} />
                            </header>

                            <div className="event-detail-media">
                                <img
                                    src={event.image_url}
                                    alt={event.title}
                                    className="event-detail-image"
                                    loading="eager"
                                />
                            </div>

                            <div className="event-detail-body">
                                {(event.sections ?? []).map((section, index) => (
                                    <section className="event-detail-block" key={`${section.heading}-${index}`}>
                                        <h2 className="event-detail-heading">{section.heading}</h2>
                                        {(section.paragraphs ?? []).map((paragraph, i) => (
                                            <p className="event-detail-text" key={i}>{paragraph}</p>
                                        ))}
                                        {section.bullets?.length ? (
                                            <ul className="event-detail-list">
                                                {section.bullets.map((bullet, i) => (
                                                    <li key={i}>{bullet}</li>
                                                ))}
                                            </ul>
                                        ) : null}
                                    </section>
                                ))}

                                <p className="event-detail-closing">
                                    Tak Banyak Alasan — terbukti, terlihat &amp; terjamin. Sertai kehadiran lapangan bersama warga Putrajaya.
                                </p>

                                {primaryCta || secondaryCta ? (
                                    <div className="event-detail-cta">
                                        {primaryCta ? <a className="btn btn-red" href={resolveHref(primaryCta.href, 'acara-list')}>{primaryCta.label} &rarr;</a> : null}
                                        {secondaryCta ? <a className="btn btn-outline-dark" href={resolveHref(secondaryCta.href, 'acara-list')}>{secondaryCta.label}</a> : null}
                                    </div>
                                ) : null}
                            </div>

                            {siblings.length > 0 ? (
                                <aside className="event-detail-siblings" aria-label="Acara lain">
                                    <h2 className="event-detail-siblings-title">Acara lain</h2>
                                    <ul className="event-detail-siblings-list">
                                        {siblings.map((sibling) => (
                                            <li key={sibling.slug} className="event-detail-siblings-item">
                                                <a href={`/acara/${sibling.slug}`} className="event-detail-siblings-card">
                                                    <span className="event-detail-siblings-thumb">
                                                        <img src={sibling.image_url} alt={sibling.title} loading="lazy" />
                                                    </span>
                                                    <span className="event-detail-siblings-card-title">{sibling.title}</span>
                                                </a>
                                            </li>
                                        ))}
                                    </ul>
                                </aside>
                            ) : null}
                        </article>
                    </div>
                </div>
            </section>
        </PublicLayout>
    );
}
