export function initAspirationForm() {
    const form = document.getElementById('aspiration-form'); const feedback = document.getElementById('form-feedback');
    if (!form || !feedback) return;
    form.addEventListener('submit', async (event) => {
        event.preventDefault(); const button = form.querySelector('button[type="submit"]'); feedback.className = 'form-feedback'; button.disabled = true;
        try { const response = await fetch(form.action, { method: 'POST', headers: { Accept: 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '' }, body: new FormData(form) }); const data = await response.json(); if (!response.ok) throw new Error(Object.values(data.errors ?? {})[0]?.[0] ?? data.message ?? 'Sila semak semula borang anda.'); form.reset(); feedback.textContent = data.message ?? 'Aspirasi anda telah diterima.'; }
        catch (error) { feedback.classList.add('error'); feedback.textContent = error instanceof Error ? error.message : 'Sila cuba lagi.'; }
        finally { button.disabled = false; feedback.classList.add('show'); }
    });
}
