export function initGallery() {
    const grid = document.getElementById('galeri-grid');
    if (!grid) {
        return;
    }

    const chips = [...document.querySelectorAll('.ig-chip')];
    const cells = [...grid.querySelectorAll('.ig-cell')];
    const empty = document.getElementById('galeri-empty');
    const lightbox = document.getElementById('galeri-lightbox');
    const lightboxImg = document.getElementById('galeri-lightbox-img');
    const lightboxTitle = document.getElementById('galeri-lightbox-title');
    const lightboxCaption = document.getElementById('galeri-lightbox-caption');
    const lightboxChip = document.getElementById('galeri-lightbox-chip');
    const lightboxCounter = document.getElementById('galeri-lightbox-counter');
    const prevBtn = document.getElementById('galeri-prev');
    const nextBtn = document.getElementById('galeri-next');
    const params = new URLSearchParams(window.location.search);

    let lastFocused = null;
    let activeIndex = -1;
    let visibleCells = cells.slice();

    const refreshVisible = () => {
        visibleCells = cells.filter((cell) => !cell.classList.contains('is-hidden'));
    };

    const applyFilter = (category, syncUrl = true) => {
        let visible = 0;

        cells.forEach((cell) => {
            const match = category === 'all' || cell.dataset.category === category;
            cell.classList.toggle('is-hidden', !match);
            if (match) {
                visible += 1;
            }
        });

        if (empty) {
            empty.hidden = visible > 0 || cells.length === 0;
        }

        chips.forEach((chip) => {
            const active = chip.dataset.filter === category;
            chip.classList.toggle('is-active', active);
            chip.setAttribute('aria-selected', String(active));
        });

        refreshVisible();

        if (!syncUrl) {
            return;
        }

        const url = new URL(window.location.href);
        if (category === 'all') {
            url.searchParams.delete('filter');
        } else {
            url.searchParams.set('filter', category);
        }
        window.history.replaceState(null, '', url.toString());
    };

    const initial = params.get('filter');
    const startCategory = initial && chips.some((c) => c.dataset.filter === initial) ? initial : 'all';
    applyFilter(startCategory, false);

    chips.forEach((chip) => {
        chip.addEventListener('click', () => applyFilter(chip.dataset.filter || 'all'));
    });

    const updateNavButtons = () => {
        if (!prevBtn || !nextBtn) {
            return;
        }
        const multi = visibleCells.length > 1;
        prevBtn.hidden = !multi;
        nextBtn.hidden = !multi;
    };

    const paintLightbox = (cell) => {
        if (!lightbox || !lightboxImg || !cell) {
            return;
        }

        lightboxImg.src = cell.dataset.src || '';
        lightboxImg.alt = cell.dataset.title || '';
        if (lightboxTitle) {
            lightboxTitle.textContent = cell.dataset.title || '';
        }
        if (lightboxCaption) {
            lightboxCaption.textContent = cell.dataset.caption || '';
        }
        if (lightboxChip) {
            lightboxChip.textContent = cell.dataset.label || cell.dataset.category || '';
        }
        if (lightboxCounter) {
            lightboxCounter.textContent = visibleCells.length
                ? `${activeIndex + 1} / ${visibleCells.length}`
                : '';
        }
        updateNavButtons();
    };

    const openLightbox = (cell) => {
        if (!lightbox || !lightboxImg) {
            return;
        }

        refreshVisible();
        activeIndex = visibleCells.indexOf(cell);
        if (activeIndex < 0) {
            activeIndex = 0;
        }

        lastFocused = document.activeElement;
        paintLightbox(visibleCells[activeIndex] || cell);

        lightbox.hidden = false;
        document.body.classList.add('galeri-lightbox-open');

        requestAnimationFrame(() => {
            lightbox.querySelector('.ig-lightbox-close')?.focus();
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
        activeIndex = -1;

        if (lastFocused && typeof lastFocused.focus === 'function') {
            lastFocused.focus();
            lastFocused = null;
        }
    };

    const step = (delta) => {
        if (visibleCells.length < 2 || activeIndex < 0) {
            return;
        }
        activeIndex = (activeIndex + delta + visibleCells.length) % visibleCells.length;
        paintLightbox(visibleCells[activeIndex]);
    };

    cells.forEach((cell) => {
        cell.addEventListener('click', () => openLightbox(cell));
    });

    lightbox?.querySelectorAll('[data-close-lightbox]').forEach((el) => {
        el.addEventListener('click', closeLightbox);
    });

    prevBtn?.addEventListener('click', () => step(-1));
    nextBtn?.addEventListener('click', () => step(1));

    document.addEventListener('keydown', (event) => {
        if (!lightbox || lightbox.hidden) {
            return;
        }
        if (event.key === 'Escape') {
            closeLightbox();
        } else if (event.key === 'ArrowLeft') {
            event.preventDefault();
            step(-1);
        } else if (event.key === 'ArrowRight') {
            event.preventDefault();
            step(1);
        }
    });

    window.addEventListener('popstate', () => {
        const next = new URLSearchParams(window.location.search).get('filter');
        applyFilter(next && chips.some((c) => c.dataset.filter === next) ? next : 'all', false);
    });
}
