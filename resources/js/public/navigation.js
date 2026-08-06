export function initNavigation() {
    const menuButton = document.getElementById('mobile-menu');
    const closeButton = document.getElementById('nav-close');
    const menu = document.getElementById('main-menu');
    const overlay = document.getElementById('nav-overlay');
    const navbar = document.querySelector('.navbar');

    const isOpen = () => Boolean(menu?.classList.contains('active'));

    const setOpen = (open) => {
        menu?.classList.toggle('active', open);
        menuButton?.classList.toggle('active', open);
        overlay?.classList.toggle('is-open', open);
        if (overlay) {
            overlay.hidden = !open;
            overlay.setAttribute('aria-hidden', open ? 'false' : 'true');
        }
        document.body.classList.toggle('nav-open', open);
        menuButton?.setAttribute('aria-expanded', String(open));
        menuButton?.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');

    };

    menuButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        setOpen(!isOpen());
    });

    closeButton?.addEventListener('click', (event) => {
        event.stopPropagation();
        setOpen(false);
    });

    // Click dimmed area outside sidebar → close
    overlay?.addEventListener('click', () => setOpen(false));

    // Safety: clicks on page content while open (if overlay missed) also close
    document.addEventListener('click', (event) => {
        if (!isOpen()) {
            return;
        }
        const target = event.target;
        if (!(target instanceof Node)) {
            return;
        }
        if (menu?.contains(target) || menuButton?.contains(target)) {
            return;
        }
        setOpen(false);
    });

    menu?.querySelectorAll('.nav-links a, .nav-cta').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            setOpen(false);
        }
    });

    window.addEventListener('scroll', () => {
        if (isOpen()) {
            return;
        }
        navbar?.classList.toggle('scrolled', window.scrollY > 50);
    }, { passive: true });

    // Apply compact style if page loads mid-scroll
    if (window.scrollY > 50) {
        navbar?.classList.add('scrolled');
    }
}
