export function initNavigation() {
    const menuButton = document.getElementById('mobile-menu');
    const menu = document.getElementById('main-menu');
    const navbar = document.querySelector('.navbar');

    menuButton?.addEventListener('click', () => {
        const isOpen = menu?.classList.toggle('active') ?? false;
        menuButton.classList.toggle('active', isOpen);
        menuButton.setAttribute('aria-expanded', String(isOpen));
        menuButton.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    });

    menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        menu.classList.remove('active');
        menuButton?.classList.remove('active');
        menuButton?.setAttribute('aria-expanded', 'false');
        menuButton?.setAttribute('aria-label', 'Buka menu');
    }));

    window.addEventListener('scroll', () => navbar?.classList.toggle('scrolled', window.scrollY > 50));
}
