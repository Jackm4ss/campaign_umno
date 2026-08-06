import { useForm } from '@inertiajs/react';
import { FormEvent } from 'react';

export default function JoinSection() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        identity_number: '',
        email: '',
        phone: '',
        message: '',
    });

    const handleSubmit = (e: FormEvent) => {
        e.preventDefault();
        post('/aspirasi', {
            onSuccess: () => reset(),
        });
    };

    return (
        <section id="sertai" className="py-24 bg-[#020B26]">
            <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-12">
                    <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Aspirasi</p>
                    <h2 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-white mb-4">SUARA ANDA, TEKAD KAMI</h2>
                    <p className="text-gray-400">Hantar aspirasi anda untuk masa depan Putrajaya yang lebih baik.</p>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <input
                                type="text"
                                placeholder="Nama penuh"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                className="w-full px-4 py-3 bg-white/5 border border-white/10 rounded text-white placeholder-gray-500 focus:outline-none focus:border-[#CC1A1A] transition-colors"
                            />
                            {errors.name ? <p className="text-red-400 text-xs mt-1">{errors.name}</p> : null}
                        </div>
                        <div>
                            <input
                                type="text"
                                placeholder="No. kad pengenalan"
                                value={data.identity_number}
                                onChange={(e) => setData('identity_number', e.target.value)}
                                className="w-full px-4 py-3 bg-white/5 border border-white/10 rounded text-white placeholder-gray-500 focus:outline-none focus:border-[#CC1A1A] transition-colors"
                            />
                            {errors.identity_number ? <p className="text-red-400 text-xs mt-1">{errors.identity_number}</p> : null}
                        </div>
                        <div>
                            <input
                                type="email"
                                placeholder="E-mel"
                                value={data.email}
                                onChange={(e) => setData('email', e.target.value)}
                                className="w-full px-4 py-3 bg-white/5 border border-white/10 rounded text-white placeholder-gray-500 focus:outline-none focus:border-[#CC1A1A] transition-colors"
                            />
                            {errors.email ? <p className="text-red-400 text-xs mt-1">{errors.email}</p> : null}
                        </div>
                        <div>
                            <input
                                type="tel"
                                placeholder="No. telefon"
                                value={data.phone}
                                onChange={(e) => setData('phone', e.target.value)}
                                className="w-full px-4 py-3 bg-white/5 border border-white/10 rounded text-white placeholder-gray-500 focus:outline-none focus:border-[#CC1A1A] transition-colors"
                            />
                            {errors.phone ? <p className="text-red-400 text-xs mt-1">{errors.phone}</p> : null}
                        </div>
                    </div>
                    <div>
                        <textarea
                            placeholder="Aspirasi anda..."
                            rows={5}
                            value={data.message}
                            onChange={(e) => setData('message', e.target.value)}
                            className="w-full px-4 py-3 bg-white/5 border border-white/10 rounded text-white placeholder-gray-500 focus:outline-none focus:border-[#CC1A1A] transition-colors resize-none"
                        />
                        {errors.message ? <p className="text-red-400 text-xs mt-1">{errors.message}</p> : null}
                    </div>
                    <div className="text-center">
                        <button
                            type="submit"
                            disabled={processing}
                            className="inline-flex items-center gap-2 px-10 py-4 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-[#9E1212] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            {processing ? 'Menghantar...' : 'Hantar Aspirasi'}
                        </button>
                    </div>
                </form>
            </div>
        </section>
    );
}
