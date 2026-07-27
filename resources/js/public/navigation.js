export function initNavigation() {
    const menuButton = document.getElementById('mobile-menu');
    const closeButton = document.getElementById('nav-close');
    const menu = document.getElementById('main-menu');
    const overlay = document.getElementById('nav-overlay');
    const navbar = document.querySelector('.navbar');

    const setOpen = (isOpen) => {
        menu?.classList.toggle('active', isOpen);
        menuButton?.classList.toggle('active', isOpen);
        overlay?.classList.toggle('is-open', isOpen);
        if (overlay) {
            overlay.hidden = !isOpen;
        }
        document.body.classList.toggle('nav-open', isOpen);
        menuButton?.setAttribute('aria-expanded', String(isOpen));
        menuButton?.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    };

    menuButton?.addEventListener('click', () => {
        const isOpen = !(menu?.classList.contains('active') ?? false);
        setOpen(isOpen);
    });

    closeButton?.addEventListener('click', () => setOpen(false));
    overlay?.addEventListener('click', () => setOpen(false));

    menu?.querySelectorAll('.nav-links a, .nav-cta').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });

    window.addEventListener('scroll', () => {
        navbar?.classList.toggle('scrolled', window.scrollY > 50);
    }, { passive: true });
}
