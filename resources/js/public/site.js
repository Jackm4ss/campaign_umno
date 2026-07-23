import { initAspirationForm } from './aspiration-form.js';
import { initBantuanForm } from './bantuan-form.js';
import { initCookieConsent } from './cookie-consent.js';
import { initNavigation } from './navigation.js';
import { initAspirationsTimeline } from './aspirations-timeline.js';
import { initPreloader } from './preloader.js';

function init() {
    initPreloader();
    initNavigation();
    initAspirationsTimeline();
    initAspirationForm();
    initBantuanForm();
    initCookieConsent();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
