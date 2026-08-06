import { PropsWithChildren } from 'react';
import Navigation from '../Components/Navigation';
import Footer from '../Components/Footer';
import BackToTop from '../Components/BackToTop';

interface PublicLayoutProps {
    title?: string;
}

export default function PublicLayout({ children, title }: PropsWithChildren<PublicLayoutProps>) {
    return (
        <>
            <Navigation />
            <main>{children}</main>
            <Footer />
            <BackToTop />
        </>
    );
}
