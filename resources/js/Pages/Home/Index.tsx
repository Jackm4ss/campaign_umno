import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import Hero from './sections/Hero';
import About from './sections/About';
import UpcomingEvents from './sections/UpcomingEvents';
import Programs from './sections/Programs';
import Activities from './sections/Activities';
import JoinSection from './sections/JoinSection';
import type { HomePageProps } from '../../types';

export default function HomeIndex(props: HomePageProps) {
    return (
        <PublicLayout>
            <Head title="Tak Banyak Alasan - Kempen UMNO Putrajaya" />
            <Hero />
            <About />
            <UpcomingEvents events={props.campaignEvents ?? []} />
            <Programs programs={props.programs ?? []} />
            <Activities />
            <JoinSection />
        </PublicLayout>
    );
}
