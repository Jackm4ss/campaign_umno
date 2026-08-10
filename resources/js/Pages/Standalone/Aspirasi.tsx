import { Head } from '@inertiajs/react';
import Navigation from '../../Components/Navigation';
import JoinSection from '../Home/sections/JoinSection';
import Footer from '../../Components/Footer';

export default function Aspirasi() {
    return (
        <>
            <Head title="Aspirasi - Tak Banyak Alasan" />
            <Navigation />
            <main>
                <JoinSection />
            </main>
            <Footer />
        </>
    );
}
