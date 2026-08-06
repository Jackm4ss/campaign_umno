export function initPreloader() {
    const preloader = document.getElementById('preloader');
    const progress = document.getElementById('preloaderProgress');

    if (!preloader || !progress) return;

    let loadProgress = 0;

    const loadInterval = setInterval(() => {
        loadProgress += Math.random() * 25;
        if (loadProgress >= 100) {
            loadProgress = 100;
            clearInterval(loadInterval);
            setTimeout(() => {
                preloader.classList.add('done');
            }, 400);
        }
        progress.style.width = loadProgress + '%';
    }, 200);
}
