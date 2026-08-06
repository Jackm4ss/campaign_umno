import { Link } from '@inertiajs/react';
import type { CampaignEventContentData } from '../../../types';

interface Props {
    events: CampaignEventContentData[];
}

export default function UpcomingEvents({ events }: Props) {
    if (events.length === 0) return null;

    return (
        <section id="kegiatan" className="py-24 bg-gray-50">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-16">
                    <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Jadual Kempen</p>
                    <h2 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E]">ACARA AKAN DATANG</h2>
                </div>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {events.slice(0, 6).map((event) => (
                        <Link
                            key={event.id}
                            href={`/acara/${event.slug}`}
                            className="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow"
                        >
                            <div className="aspect-video overflow-hidden">
                                <img
                                    src={event.image_url}
                                    alt={event.title}
                                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                />
                            </div>
                            <div className="p-6">
                                <p className="text-xs font-bold uppercase tracking-widest text-[#CC1A1A] mb-2">
                                    {event.date_label}
                                </p>
                                <h3 className="font-bold text-lg text-[#1A1A2E] mb-2 group-hover:text-[#CC1A1A] transition-colors">
                                    {event.title}
                                </h3>
                                <p className="text-gray-600 text-sm mb-4 line-clamp-2">{event.short_desc}</p>
                                <p className="text-xs text-gray-500">{event.place}</p>
                                <span className="inline-block mt-4 text-xs font-bold uppercase tracking-widest text-[#1A3C9E]">
                                    Detail selengkapnya →
                                </span>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>
        </section>
    );
}
