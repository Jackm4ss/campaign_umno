export function initCookieConsent() {
    if (localStorage.getItem('cookieAccepted')) return;
    const banner = document.createElement('div');
    banner.className = 'cookie-banner';
    banner.innerHTML = '<div class="cookie-content"><p>Kami menggunakan kuki untuk meningkatkan pengalaman pelayaran anda.</p><div class="cookie-actions"><button type="button" class="btn-cookie-reject">Tolak</button><button type="button" class="btn-cookie-accept">Terima Semua</button></div></div>';
    document.body.appendChild(banner); window.setTimeout(() => banner.classList.add('show'), 300);
    const close = () => { localStorage.setItem('cookieAccepted', 'true'); banner.classList.remove('show'); window.setTimeout(() => banner.remove(), 500); };
    banner.querySelectorAll('button').forEach((button) => button.addEventListener('click', close));
}
