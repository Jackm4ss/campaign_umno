import { ReactNode } from 'react';
import Preloader from '../Components/Preloader';
import Navigation from '../Components/Navigation';
import Footer from '../Components/Footer';
import BackToTop from '../Components/BackToTop';
import CookieConsent from '../Components/CookieConsent';

interface Props {
    children: ReactNode;
}

export default function PublicLayout({ children }: Props) {
    return (
        <>
            <Preloader />
            <Navigation />

            <main>{children}</main>

            <Footer />
            <BackToTop />
            <CookieConsent />
        </>
    );
}
