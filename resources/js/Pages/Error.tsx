import { Head } from '@inertiajs/react';

interface ErrorPageProps {
    status: number;
}

export default function ErrorPage({ status }: ErrorPageProps) {
    const title = status === 404 ? 'Halaman Tidak Ditemui' : 'Ralat Pelayan';
    const description = status === 404
        ? 'Halaman yang anda cari tidak wujud atau telah dipindahkan.'
        : 'Maaf, berlaku ralat pada pelayan. Sila cuba semula.';

    return (
        <>
            <Head title={title} />
            <div className="min-h-screen flex items-center justify-center bg-gray-50 px-4">
                <div className="text-center">
                    <p className="text-6xl font-['Bebas_Neue'] text-[#CC1A1A] mb-4">{status}</p>
                    <h1 className="text-2xl font-bold text-[#1A1A2E] mb-2">{title}</h1>
                    <p className="text-gray-600 mb-8">{description}</p>
                    <a href="/" className="inline-flex items-center gap-2 px-6 py-3 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-[#9E1212] transition-colors">
                        Kembali ke Utama
                    </a>
                </div>
            </div>
        </>
    );
}
