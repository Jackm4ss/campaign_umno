import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import { baseUrl } from '../../lib/url';
import JoinSection from '../Home/sections/JoinSection';

export default function Aspirasi() {
    return (
        <PublicLayout>
            <Head title="Aspirasi - Tak Banyak Alasan" />
            <div className="aspirasi-back-bar">
                <div className="container">
                    <a href={baseUrl('/')} className="aspirasi-back-link" title="Kembali ke halaman utama Tak Banyak Alasan">
                        <span className="aspirasi-back-circle">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                        </span>
                        Laman Utama
                    </a>
                </div>
            </div>
            <JoinSection />
        </PublicLayout>
    );
}
