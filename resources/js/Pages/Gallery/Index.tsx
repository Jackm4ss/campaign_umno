import { Head } from '@inertiajs/react';
import { useState } from 'react';
import PublicLayout from '../../Layouts/PublicLayout';
import type { GalleryPageProps } from '../../types';

export default function GalleryIndex({ gallery }: GalleryPageProps) {
    const [activeCategory, setActiveCategory] = useState('semua');

    const categories = ['semua', ...new Set(gallery.map((item) => item.category))];
    const filtered = activeCategory === 'semua' ? gallery : gallery.filter((item) => item.category === activeCategory);

    return (
        <PublicLayout>
            <Head title="Galeri" />
            <section className="pt-24 pb-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12 pt-8">
                        <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Dokumentasi</p>
                        <h1 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E]">GALERI TAK BANYAK ALASAN</h1>
                    </div>

                    <div className="flex flex-wrap justify-center gap-3 mb-12">
                        {categories.map((cat) => (
                            <button
                                key={cat}
                                onClick={() => setActiveCategory(cat)}
                                className={`px-5 py-2 text-xs font-bold uppercase tracking-widest rounded transition-colors ${
                                    activeCategory === cat
                                        ? 'bg-[#CC1A1A] text-white'
                                        : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
                                }`}
                            >
                                {cat}
                            </button>
                        ))}
                    </div>

                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        {filtered.map((item) => (
                            <div key={item.id} className="group relative aspect-square rounded-xl overflow-hidden bg-gray-100">
                                <img
                                    src={item.src}
                                    alt={item.title}
                                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                />
                                <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div className="absolute bottom-0 left-0 right-0 p-4">
                                        <span className="inline-block px-2 py-1 bg-[#CC1A1A] text-white text-[10px] font-bold uppercase tracking-wider rounded mb-2">
                                            {item.label}
                                        </span>
                                        <h3 className="text-white text-sm font-bold">{item.title}</h3>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </PublicLayout>
    );
}
