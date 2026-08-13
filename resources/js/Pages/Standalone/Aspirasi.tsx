import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import JoinSection from '../Home/sections/JoinSection';

export default function Aspirasi() {
    return (
        <PublicLayout>
            <Head title="Aspirasi - Tak Banyak Alasan" />
            <JoinSection />
        </PublicLayout>
    );
}
