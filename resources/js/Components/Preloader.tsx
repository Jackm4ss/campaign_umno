import { useEffect, useRef } from 'react';

let hasPlayed = false;

export default function Preloader() {
    const progressRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        const preloader = document.getElementById('preloader');
        const progress = progressRef.current;

        if (!preloader || !progress) return;

        // Inertia keeps the layout mounted across visits; only boot once (like the original Blade page load).
        if (hasPlayed) {
            preloader.classList.add('done');
            return;
        }
        hasPlayed = true;

        let loadProgress = 0;
        const interval = window.setInterval(() => {
            loadProgress += Math.random() * 25;
            if (loadProgress >= 100) {
                loadProgress = 100;
                window.clearInterval(interval);
                window.setTimeout(() => {
                    preloader.classList.add('done');
                }, 400);
            }
            progress.style.width = loadProgress + '%';
        }, 200);

        return () => window.clearInterval(interval);
    }, []);

    return (
        <div className="preloader" id="preloader">
            <div className="preloader-inner">
                <div className="preloader-logo">
                    <img src="/assets/logo-tba-text.png" alt="Tak Banyak Alasan" className="preloader-logo-img" />
                </div>
                <div className="preloader-bar">
                    <div className="preloader-progress" id="preloaderProgress" ref={progressRef}></div>
                </div>
            </div>
        </div>
    );
}
