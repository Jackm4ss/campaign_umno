export function initBackToTop() {
    const button = document.getElementById('back-to-top');
    if (!button) {
        return;
    }

    const hero = document.querySelector('.hero, #utama');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const threshold = () => {
        if (hero instanceof HTMLElement) {
            return Math.max(280, hero.offsetHeight * 0.85);
        }

        return Math.max(400, window.innerHeight * 0.5);
    };

    const setVisible = (visible) => {
        button.classList.toggle('is-visible', visible);
        button.hidden = !visible;
        button.setAttribute('aria-hidden', visible ? 'false' : 'true');
    };

    const update = () => {
        setVisible(window.scrollY > threshold());
    };

    button.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: prefersReducedMotion ? 'auto' : 'smooth',
        });
    });

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
    update();
}
