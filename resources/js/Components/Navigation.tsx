import { Link } from '@inertiajs/react';

export default function Navigation() {
    return (
        <nav className="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex justify-between items-center h-16">
                    <Link href="/" className="flex items-center gap-2">
                        <img
                            src="/assets/admin-logo-blue.png"
                            alt="Tak Banyak Alasan"
                            className="h-8 w-auto"
                        />
                        <span className="font-bold text-lg tracking-tight text-[#1A3C9E]">
                            TAK BANYAK ALASAN
                        </span>
                    </Link>

                    <div className="hidden md:flex items-center gap-6">
                        <a href="/#mengenai" className="text-sm font-medium text-gray-700 hover:text-[#CC1A1A] transition-colors">
                            Mengenai
                        </a>
                        <a href="/#kegiatan" className="text-sm font-medium text-gray-700 hover:text-[#CC1A1A] transition-colors">
                            Kegiatan
                        </a>
                        <a href="/#program" className="text-sm font-medium text-gray-700 hover:text-[#CC1A1A] transition-colors">
                            Program
                        </a>
                        <Link href="/galeri" className="text-sm font-medium text-gray-700 hover:text-[#CC1A1A] transition-colors">
                            Galeri
                        </Link>
                        <Link href="/bantuan" className="text-sm font-medium text-gray-700 hover:text-[#CC1A1A] transition-colors">
                            Bantuan
                        </Link>
                        <a
                            href="/#sertai"
                            className="inline-flex items-center gap-2 px-5 py-2.5 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-[#9E1212] transition-colors"
                        >
                            Sertai Gerakan
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    );
}
