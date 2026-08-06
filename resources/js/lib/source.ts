/**
 * Detect the traffic source of the current visit from URL parameters.
 * Used by public forms (bantuan, aspirasi) so the admin dashboard can
 * chart where submissions come from (Facebook, Google, TikTok, ...).
 */
export function detectSource(): string {
    const params = new URLSearchParams(window.location.search);

    const utm = (params.get('utm_source') ?? '').trim().toLowerCase();
    if (utm !== '') return utm;

    const source = (params.get('source') ?? '').trim().toLowerCase();
    if (source !== '') return source;

    if (params.get('fbclid')) return 'facebook';
    if (params.get('gclid')) return 'google';
    if (params.get('ttclid')) return 'tiktok';
    if (params.get('igshid')) return 'instagram';
    if (params.get('ytclid')) return 'youtube';

    return 'direct';
}
