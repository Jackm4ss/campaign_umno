import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { ProgramShowProps } from '../../types';

function resolveHref(href: string, listAnchor: string): string {
    if (href === 'bantuan') return '/bantuan';
    if (href === listAnchor) return '/#program';

    return `/#${href}`;
}

export default function ProgramShow({ program, siblings }: ProgramShowProps) {
    const primaryCta = program.cta?.primary;
    const secondaryCta = program.cta?.secondary;

    return (
        <PublicLayout>
            <Head title={`${program.title} - Tak Banyak Alasan`} />
            <section className="program-detail-page section-pad">
                <div className="container program-detail-container">
                    <div className="program-detail-shell">
                        <a href="/#program" className="program-detail-back" title="Kembali ke senarai program">
                            <span className="program-detail-back-pad">
                                <svg className="program-detail-back-fillet program-detail-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                                <span className="program-detail-back-circle">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                                </span>
                                <svg className="program-detail-back-fillet program-detail-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                            </span>
                        </a>

                        <article className="program-detail-card">
                            <header className="program-detail-header">
                                <span className="section-label">Program Kami</span>
                                <h1 className="section-title program-detail-title">{program.title}</h1>
                                <div className="program-detail-lead" dangerouslySetInnerHTML={{ __html: program.lead }} />
                            </header>

                            <div className="program-detail-media">
                                <img
                                    src={program.image_url}
                                    alt={program.title}
                                    className="program-detail-image"
                                    loading="eager"
                                />
                            </div>

                            <div className="program-detail-body">
                                {(program.sections ?? []).map((section, index) => (
                                    <section className="program-detail-block" key={`${section.heading}-${index}`}>
                                        <h2 className="program-detail-heading">{section.heading}</h2>
                                        {(section.paragraphs ?? []).map((paragraph, i) => (
                                            <p className="program-detail-text" key={i}>{paragraph}</p>
                                        ))}
                                        {section.bullets?.length ? (
                                            <ul className="program-detail-list">
                                                {section.bullets.map((bullet, i) => (
                                                    <li key={i}>{bullet}</li>
                                                ))}
                                            </ul>
                                        ) : null}
                                    </section>
                                ))}

                                <p className="program-detail-closing">
                                    Tak Banyak Alasan — terbukti, terlihat &amp; terjamin. Program ini sebahagian daripada tekad kami bersama warga Putrajaya.
                                </p>

                                {primaryCta || secondaryCta ? (
                                    <div className="program-detail-cta">
                                        {primaryCta ? <a className="btn btn-red" href={resolveHref(primaryCta.href, 'program-list')}>{primaryCta.label} &rarr;</a> : null}
                                        {secondaryCta ? <a className="btn btn-outline-dark" href={resolveHref(secondaryCta.href, 'program-list')}>{secondaryCta.label}</a> : null}
                                    </div>
                                ) : null}
                            </div>

                            {siblings.length > 0 ? (
                                <aside className="program-detail-siblings" aria-label="Program lain">
                                    <h2 className="program-detail-siblings-title">Program lain</h2>
                                    <ul className="program-detail-siblings-list">
                                        {siblings.map((sibling) => (
                                            <li key={sibling.slug} className="program-detail-siblings-item">
                                                <a href={`/program/${sibling.slug}`} className="program-detail-siblings-card">
                                                    <span className="program-detail-siblings-thumb">
                                                        <img src={sibling.image_url} alt={sibling.title} loading="lazy" />
                                                    </span>
                                                    <span className="program-detail-siblings-card-title">{sibling.title}</span>
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
