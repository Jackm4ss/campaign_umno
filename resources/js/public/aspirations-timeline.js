export function initAspirationsTimeline() {
    const items = [...document.querySelectorAll('.aspirasi-item')];
    if (!('IntersectionObserver' in window) || items.length === 0) return;
    const observer = new IntersectionObserver((entries) => entries.forEach((entry) => { if (entry.isIntersecting) { items.forEach((item) => item.classList.remove('active')); entry.target.classList.add('active'); } }), { rootMargin: '-40% 0px -40% 0px', threshold: 0 });
    items.forEach((item) => observer.observe(item));
}
