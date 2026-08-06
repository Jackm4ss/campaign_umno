import { Link } from '@inertiajs/react';
import type { ProgramData } from '../../../types';

interface Props {
    programs: ProgramData[];
}

export default function Programs({ programs }: Props) {
    if (programs.length === 0) return null;

    return (
        <section id="program" className="py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-16">
                    <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Inisiatif Kami</p>
                    <h2 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E]">PROGRAM TAK BANYAK ALASAN</h2>
                </div>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {programs.map((program) => (
                        <Link
                            key={program.id}
                            href={`/program/${program.slug}`}
                            className="group bg-gray-50 rounded-xl overflow-hidden hover:bg-white hover:shadow-lg transition-all"
                        >
                            <div className="aspect-video overflow-hidden">
                                <img
                                    src={program.image_url}
                                    alt={program.title}
                                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                />
                            </div>
                            <div className="p-6">
                                <h3 className="font-bold text-lg text-[#1A1A2E] mb-2 group-hover:text-[#CC1A1A] transition-colors">
                                    {program.title}
                                </h3>
                                <p className="text-gray-600 text-sm line-clamp-3">{program.short_desc}</p>
                                <span className="inline-block mt-4 text-xs font-bold uppercase tracking-widest text-[#1A3C9E]">
                                    Ketahui lebih →
                                </span>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>
        </section>
    );
}
