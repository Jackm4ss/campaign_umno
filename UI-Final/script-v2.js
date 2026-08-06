const heroHeadlines = [
  'TAK BANYAK <span style="color: #8fb3ff;">ALASAN</span><br>GERAK KERJA UMNO PUTRAJAYA',
  'UMNO PUTRAJAYA<br><span style="color: #8fb3ff;">GERAK</span> BERSAMA',
  'TENGKU HAFIZ<br><span style="color: #8fb3ff;">SUARA</span> PENERANGAN'
];
let curSlide = 0;
let slideTimer;

function goSlide(n) {
  document.querySelectorAll('.hero-slide').forEach((s, i) => s.classList.toggle('active', i === n));
  document.querySelectorAll('.hero-dots .dot').forEach((d, i) => d.classList.toggle('active', i === n));
  curSlide = n;
  
  const headline = document.getElementById('hero-headline');
  if (headline) {
    headline.style.opacity = '0';
    setTimeout(() => {
      headline.innerHTML = heroHeadlines[curSlide];
      headline.style.opacity = '1';
    }, 400); // Wait for fade out to complete before changing text
  }
  
  clearInterval(slideTimer);
  slideTimer = setInterval(() => goSlide((curSlide + 1) % 3), 5000);
}

document.addEventListener('DOMContentLoaded', () => {
  // Start slider
  slideTimer = setInterval(() => goSlide((curSlide + 1) % 3), 5000);

  // Attach click to dots
  document.querySelectorAll('.hero-dots .dot').forEach((dot, index) => {
    dot.addEventListener('click', () => goSlide(index));
  });
  // Navbar scroll effect
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // Sticky Timeline highlight logic
  const aspirasiItems = document.querySelectorAll('.aspirasi-item');
  
  // Use IntersectionObserver to detect which item is currently in view
  const observerOptions = {
    root: null,
    rootMargin: '-40% 0px -40% 0px', // Trigger when item is in middle of screen
    threshold: 0
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Remove active class from all
        aspirasiItems.forEach(item => item.classList.remove('active'));
        // Add active class to intersecting
        entry.target.classList.add('active');
      }
    });
  }, observerOptions);

  aspirasiItems.forEach(item => {
    observer.observe(item);
  });
});

// Cookie Consent
document.addEventListener('DOMContentLoaded', () => {
  if (!localStorage.getItem('cookieAccepted')) {
    const banner = document.createElement('div');
    banner.className = 'cookie-banner';
    banner.innerHTML = `
      <div class="cookie-content">
        <p>Kami menggunakan kuki untuk meningkatkan pengalaman pelayaran anda. Dengan meneruskan, anda bersetuju dengan <a href="#">Dasar Privasi</a> dan <a href="#">Notis PDPA 2010</a> kami.</p>
        <div class="cookie-actions">
          <button id="btn-reject-cookie" class="btn-cookie-reject">Tolak</button>
          <button id="btn-accept-cookie" class="btn-cookie-accept">Terima Semua</button>
        </div>
      </div>
    `;
    document.body.appendChild(banner);

    setTimeout(() => {
      banner.classList.add('show');
    }, 1000);

    const closeBanner = () => {
      localStorage.setItem('cookieAccepted', 'true');
      banner.classList.remove('show');
      setTimeout(() => banner.remove(), 500);
    };

    document.getElementById('btn-accept-cookie').addEventListener('click', closeBanner);
    document.getElementById('btn-reject-cookie').addEventListener('click', closeBanner);
  }
});

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', () => {
  const mobileMenu = document.getElementById('mobile-menu');
  const navMenu = document.querySelector('.nav-menu');
  
  if (mobileMenu && navMenu) {
    mobileMenu.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      navMenu.classList.toggle('active');
    });
  }
});
