import { Link } from '@inertiajs/react';
import type { ProgramData } from '../../../types';

interface Props {
    programs: ProgramData[];
}

export default function Programs({ programs }: Props) {
    return (
        <section id="program" className="program section-pad">
            <div className="container">
                <div className="program-header fade-up">
                    <span className="section-label">Program Kami</span>
                    <h2 className="section-title">PROGRAM TAK BANYAK ALASAN</h2>
                    <p className="mengenai-text">Enam teras program kempen untuk warga Putrajaya.</p>
                </div>

                <div className="program-grid">
                    {programs.map((program) => (
                        <Link
                            key={program.slug}
                            href={`/program/${program.slug}`}
                            className="program-card fade-up"
                            aria-label={program.title}
                        >
                            <div className="program-icon-wrap">
                                <img src={program.image_url} alt="" className="program-icon-img" loading="lazy" />
                            </div>
                            <h3 className="program-title">{program.title}</h3>
                            <p className="program-desc">{program.short_desc}</p>
                            <span className="program-card-cta">Ketahui lebih &rarr;</span>
                        </Link>
                    ))}
                </div>
            </div>
        </section>
    );
}
