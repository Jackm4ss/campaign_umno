import { Link } from '@inertiajs/react';

export default function Footer() {
    return (
        <footer className="bg-[#020B26] text-white pt-16 pb-8">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                    <div>
                        <div className="flex items-center gap-3 mb-4">
                            <img
                                src="/assets/admin-logo-blue.png"
                                alt="Tak Banyak Alasan"
                                className="h-10 w-auto brightness-0 invert"
                                loading="lazy"
                            />
                        </div>
                        <p className="text-gray-400 text-sm leading-relaxed mb-4">
                            Kempen UMNO Putrajaya melalui Tak Banyak Alasan.
                        </p>
                        <div className="text-gray-400 text-sm space-y-1">
                            <p>info@takbanyakalasan.com</p>
                            <p>+603-8888 XXXX</p>
                        </div>
                    </div>

                    <div>
                        <h2 className="text-sm font-bold uppercase tracking-widest text-white mb-4">
                            Kempen
                        </h2>
                        <div className="flex flex-col gap-2">
                            <a href="/#mengenai" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Mengapa Tak Banyak Alasan
                            </a>
                            <Link href="/galeri" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Foto &amp; Video
                            </Link>
                            <Link href="/bantuan" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Borang Bantuan
                            </Link>
                            <a href="/#sertai" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Sertai Gerakan
                            </a>
                        </div>
                    </div>

                    <div>
                        <h2 className="text-sm font-bold uppercase tracking-widest text-white mb-4">
                            Sosial Media
                        </h2>
                        <div className="flex flex-col gap-2">
                            <a href="#" target="_blank" rel="noopener" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Facebook
                            </a>
                            <a href="https://www.instagram.com/takbanyakalasan" target="_blank" rel="noopener" className="text-gray-400 text-sm hover:text-white transition-colors">
                                Instagram
                            </a>
                            <a href="#" target="_blank" rel="noopener" className="text-gray-400 text-sm hover:text-white transition-colors">
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div className="border-t border-gray-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p className="text-gray-500 text-xs uppercase tracking-widest">
                        &copy; 2026 TAK BANYAK ALASAN
                    </p>
                    <Link href="/admin" className="text-gray-600 text-xs hover:text-gray-400 transition-colors">
                        Admin
                    </Link>
                </div>
            </div>
        </footer>
    );
}
