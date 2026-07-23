const headlines = ['TAK BANYAK <span style="color: #8fb3ff;">ALASAN</span><br>GERAK KERJA UMNO PUTRAJAYA', 'UMNO PUTRAJAYA<br><span style="color: #8fb3ff;">GERAK</span> BERSAMA', 'BERSAMA WARGA<br><span style="color: #8fb3ff;">GERAK</span> UNTUK RAKYAT'];

export function initHeroSlider() {
    const slides = [...document.querySelectorAll('.hero-slide')];
    const dots = [...document.querySelectorAll('.hero-dots .dot')];
    const headline = document.getElementById('hero-headline');
    if (slides.length === 0) return;
    let current = 0; let timer;
    const show = (index) => { current = index; slides.forEach((slide, itemIndex) => slide.classList.toggle('active', itemIndex === current)); dots.forEach((dot, itemIndex) => dot.classList.toggle('active', itemIndex === current)); if (headline) headline.innerHTML = headlines[current]; clearInterval(timer); timer = window.setInterval(() => show((current + 1) % slides.length), 5000); };
    dots.forEach((dot, index) => dot.addEventListener('click', () => show(index)));
    timer = window.setInterval(() => show((current + 1) % slides.length), 5000);
}
