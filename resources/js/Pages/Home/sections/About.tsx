export default function About() {
    return (
        <section id="mengenai" className="py-24 bg-white">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-16">
                    <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">
                        Mengapa Tak Banyak Alasan
                    </p>
                    <h2 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E] mb-6">
                        GERAKAN UNTUK PUTRAJAYA
                    </h2>
                    <p className="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                        Tak Banyak Alasan bukan sekadar slogan — ia komitmen nyata UMNO Putrajaya untuk bertindak, bukan berjanji.
                        Setiap program, setiap kehadiran di lapangan, setiap bantuan yang sampai adalah bukti bahawa alasan tidak menjadi penghalang.
                    </p>
                </div>
                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div className="text-center p-8 rounded-xl bg-gray-50 hover:bg-red-50 transition-colors">
                        <div className="w-16 h-16 bg-[#CC1A1A]/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg className="w-8 h-8 text-[#CC1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <h3 className="font-bold text-lg text-[#1A1A2E] mb-3">Khidmat Rakyat</h3>
                        <p className="text-gray-600 text-sm leading-relaxed">Program bantuan dan kebajikan yang sampai terus kepada warga Putrajaya.</p>
                    </div>
                    <div className="text-center p-8 rounded-xl bg-gray-50 hover:bg-blue-50 transition-colors">
                        <div className="w-16 h-16 bg-[#1A3C9E]/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg className="w-8 h-8 text-[#1A3C9E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" /></svg>
                        </div>
                        <h3 className="font-bold text-lg text-[#1A1A2E] mb-3">Suara Rakyat</h3>
                        <p className="text-gray-600 text-sm leading-relaxed">Aspirasi warga didengar, direkod, dan dijadikan asas program.</p>
                    </div>
                    <div className="text-center p-8 rounded-xl bg-gray-50 hover:bg-red-50 transition-colors">
                        <div className="w-16 h-16 bg-[#CC1A1A]/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg className="w-8 h-8 text-[#CC1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        </div>
                        <h3 className="font-bold text-lg text-[#1A1A2E] mb-3">Gerak Kerja</h3>
                        <p className="text-gray-600 text-sm leading-relaxed">Mobilisasi akar umbi yang teratur dan berkesan di setiap presint.</p>
                    </div>
                </div>
            </div>
        </section>
    );
}
