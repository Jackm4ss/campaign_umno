/**
 * Resolve the main-domain base URL shared by HandleInertiaRequests.
 *
 * Inertia v3 stores the initial page object in a <script data-page> JSON tag,
 * NOT in `window.__page` (that was v1). We parse it once and cache the origin.
 */
let cachedOrigin: string | null | undefined;

function mainOrigin(): string | null {
    if (cachedOrigin !== undefined) return cachedOrigin;

    try {
        const el = document.querySelector('script[data-page]');
        if (el?.textContent) {
            const base: string | undefined = JSON.parse(el.textContent).props?.baseUrl;
            if (base) {
                cachedOrigin = new URL(base).origin;
                return cachedOrigin;
            }
        }
    } catch { /* malformed JSON or URL — treat as unavailable */ }

    cachedOrigin = null;
    return null;
}

/**
 * Prefix a path with the main domain origin when the current page
 * is served from a different host (e.g. bantuan.takbanyakalasan.com).
 * On the main domain this is a no-op and returns the path unchanged.
 */
export function baseUrl(path: string): string {
    const origin = mainOrigin();
    if (!origin) return path;
    if (window.location.origin === origin) return path;
    return origin + path;
}
