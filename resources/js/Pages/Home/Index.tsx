import { Head } from '@inertiajs/react';
import PublicLayout from '../../Layouts/PublicLayout';
import Hero from './sections/Hero';
import About from './sections/About';
import UpcomingEvents from './sections/UpcomingEvents';
import Programs from './sections/Programs';
import Activities from './sections/Activities';
import JoinSection from './sections/JoinSection';
import type { HomePageProps } from '../../types';

export default function HomeIndex({ articles, events, leaders, gallery, programs, campaignEvents, settings }: HomePageProps) {
    return (
        <PublicLayout>
            <Head title="Kempen UMNO Putrajaya" />
            <Hero />
            <About />
            <UpcomingEvents events={campaignEvents ?? []} />
            <Programs programs={programs ?? []} />
            <Activities events={events ?? []} articles={articles ?? []} leaders={leaders ?? []} />
            <JoinSection />
        </PublicLayout>
    );
}
