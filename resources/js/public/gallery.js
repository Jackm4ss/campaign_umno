export function initGallery() {
    const grid = document.getElementById('galeri-grid');
    if (!grid) {
        return;
    }

    const stories = [...document.querySelectorAll('.galeri-story')];
    const items = [...grid.querySelectorAll('.galeri-card')];
    const empty = document.getElementById('galeri-empty');
    const lightbox = document.getElementById('galeri-lightbox');
    const lightboxImg = document.getElementById('galeri-lightbox-img');
    const lightboxTitle = document.getElementById('galeri-lightbox-title');
    const lightboxCaption = document.getElementById('galeri-lightbox-caption');
    const lightboxClose = lightbox?.querySelector('.galeri-lightbox-close');
    const params = new URLSearchParams(window.location.search);
    const supportsReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let lastFocused = null;

    const applyFilter = (category, syncUrl = true) => {
        let visible = 0;

        items.forEach((item) => {
            const match = category === 'all' || item.dataset.category === category;
            item.classList.toggle('is-hidden', !match);
            if (match) {
                visible += 1;
            }
        });

        if (empty) {
            empty.hidden = visible > 0;
        }

        stories.forEach((button) => {
            const active = button.dataset.filter === category;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-selected', String(active));
            if (active) {
                button.tabIndex = 0;
            } else {
                button.tabIndex = 0;
            }
        });

        if (syncUrl && category !== 'all') {
            const url = new URL(window.location.href);
            url.searchParams.set('filter', category);
            window.history.replaceState(null, '', url.toString());
        } else if (syncUrl) {
            const url = new URL(window.location.href);
            url.searchParams.delete('filter');
            window.history.replaceState(null, '', url.toString());
        }
    };

    const initial = params.get('filter');
    const startCategory = initial && stories.some((s) => s.dataset.filter === initial) ? initial : 'all';
    applyFilter(startCategory, false);

    stories.forEach((button) => {
        button.addEventListener('click', () => applyFilter(button.dataset.filter || 'all'));
    });

    const openLightbox = (item) => {
        if (!lightbox || !lightboxImg) {
            return;
        }

        lastFocused = document.activeElement;

        lightboxImg.src = item.dataset.src || '';
        lightboxImg.alt = item.dataset.title || '';
        if (lightboxTitle) {
            lightboxTitle.textContent = item.dataset.title || '';
        }
        if (lightboxCaption) {
            lightboxCaption.textContent = item.dataset.caption || '';
        }

        lightbox.hidden = false;
        document.body.classList.add('galeri-lightbox-open');

        requestAnimationFrame(() => {
            lightboxClose?.focus();
        });
    };

    const closeLightbox = () => {
        if (!lightbox || lightbox.hidden) {
            return;
        }

        lightbox.hidden = true;
        lightboxImg.removeAttribute('src');
        lightboxImg.removeAttribute('alt');
        document.body.classList.remove('galeri-lightbox-open');

        if (lastFocused && typeof lastFocused.focus === 'function') {
            lastFocused.focus();
            lastFocused = null;
        }
    };

    items.forEach((item) => {
        item.addEventListener('click', () => openLightbox(item));
    });

    lightbox?.querySelectorAll('[data-close-lightbox]').forEach((el) => {
        el.addEventListener('click', closeLightbox);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && lightbox && !lightbox.hidden) {
            closeLightbox();
        }
    });

    window.addEventListener('popstate', () => {
        const next = new URLSearchParams(window.location.search).get('filter');
        applyFilter(next && stories.some((s) => s.dataset.filter === next) ? next : 'all', false);
    });

    void supportsReducedMotion;
}
