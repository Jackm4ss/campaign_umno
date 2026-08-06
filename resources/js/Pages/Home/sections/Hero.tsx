export default function Hero() {
    return (
        <section id="hero" className="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-[#020B26] via-[#071E63] to-[#1A3C9E] overflow-hidden pt-16">
            <div className="absolute inset-0 opacity-20">
                <img src="/assets/hero-bg.jpg" alt="" className="w-full h-full object-cover" loading="eager" />
            </div>
            <div className="relative z-10 text-center px-4 max-w-4xl mx-auto">
                <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[6px] mb-6">
                    UMNO Putrajaya
                </p>
                <h1 className="font-['Bebas_Neue'] text-5xl md:text-7xl lg:text-8xl text-white leading-none mb-6">
                    TAK BANYAK ALASAN
                </h1>
                <p className="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
                    Gerakan penerangan, khidmat rakyat, dan mobilisasi akar umbi untuk Putrajaya yang lebih baik.
                </p>
                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        href="#sertai"
                        className="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-[#9E1212] transition-all hover:scale-105 shadow-lg shadow-red-900/30"
                    >
                        Sertai Gerakan
                    </a>
                    <a
                        href="#mengenai"
                        className="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-white/30 text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-white/10 transition-colors"
                    >
                        Ketahui Lebih
                    </a>
                </div>
            </div>
        </section>
    );
}
