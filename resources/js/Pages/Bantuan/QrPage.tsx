import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';

export default function BantuanQrPage() {
    return (
        <PublicLayout>
            <Head title="QR Bantuan" />
            <section className="pt-24 pb-16 bg-white min-h-screen flex items-center justify-center">
                <div className="text-center px-4">
                    <h1 className="font-['Bebas_Neue'] text-3xl text-[#1A1A2E] mb-6">IMBAS QR UNTUK BORANG BANTUAN</h1>
                    <div className="inline-block p-6 bg-white rounded-2xl shadow-lg border">
                        <img src="/bantuan/qr-image" alt="QR Code Bantuan" className="w-64 h-64" />
                    </div>
                    <p className="text-gray-600 mt-6 text-sm">Imbas kod QR di atas untuk terus ke borang bantuan.</p>
                </div>
            </section>
        </PublicLayout>
    );
}
