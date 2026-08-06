/**
 * Prefix a path with the main domain origin when the current page
 * is served from a different host (e.g. bantuan.takbanyakalasan.com).
 * On the main domain this is a no-op and returns the path unchanged.
 */
export function baseUrl(path: string): string {
    const props = (window as any).__page?.props;
    const base: string | undefined = props?.baseUrl;

    if (!base) return path;

    try {
        const mainOrigin = new URL(base).origin;
        if (window.location.origin === mainOrigin) return path;
        return mainOrigin + path;
    } catch {
        return path;
    }
}
