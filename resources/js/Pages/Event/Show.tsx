import { Head, Link } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { EventShowProps } from '../../types';

export default function EventShow({ event, siblings }: EventShowProps) {
    return (
        <PublicLayout>
            <Head title={event.title} />
            <section className="pt-24 pb-16 bg-white">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
                    <Link href="/#kegiatan" className="inline-flex items-center gap-2 text-sm text-[#1A3C9E] hover:text-[#CC1A1A] transition-colors mb-8">
                        ← Kembali ke senarai acara
                    </Link>

                    <div className="aspect-video rounded-xl overflow-hidden mb-8">
                        <img src={event.image_url} alt={event.title} className="w-full h-full object-cover" />
                    </div>

                    <div className="flex flex-wrap items-center gap-4 mb-4">
                        <span className="px-3 py-1 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-wider rounded">{event.date_label}</span>
                        <span className="text-gray-500 text-sm">{event.place}</span>
                    </div>

                    <h1 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E] mb-4">{event.title}</h1>
                    <p className="text-gray-600 text-lg leading-relaxed mb-10">{event.lead}</p>

                    {event.sections.map((section, i) => (
                        <div key={i} className="mb-10">
                            <h2 className="font-bold text-xl text-[#1A1A2E] mb-4">{section.heading}</h2>
                            {section.paragraphs?.map((p, j) => (
                                <p key={j} className="text-gray-600 leading-relaxed mb-4">{p}</p>
                            ))}
                            {section.bullets ? (
                                <ul className="list-disc list-inside text-gray-600 space-y-2 ml-4">
                                    {section.bullets.map((b, j) => <li key={j}>{b}</li>)}
                                </ul>
                            ) : null}
                        </div>
                    ))}

                    {siblings.length > 0 ? (
                        <div className="mt-16 pt-10 border-t border-gray-200">
                            <h2 className="font-bold text-lg text-[#1A1A2E] mb-4">Acara lain</h2>
                            <div className="flex flex-wrap gap-3">
                                {siblings.map((s) => (
                                    <Link key={s.slug} href={`/acara/${s.slug}`} className="px-4 py-2 bg-gray-100 rounded text-sm text-gray-700 hover:bg-[#CC1A1A] hover:text-white transition-colors">
                                        {s.title}
                                    </Link>
                                ))}
                            </div>
                        </div>
                    ) : null}
                </div>
            </section>
        </PublicLayout>
    );
}
