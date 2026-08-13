import { FormEvent, useState } from 'react';
import LegalConsentFields from '../../../Components/LegalConsentFields';
import { detectSource } from '../../../lib/source';
import { baseUrl } from '../../../lib/url';

interface FormState {
    name: string;
    identity_type: string;
    identity_number: string;
    email: string;
    phone: string;
    message: string;
}

const initialState: FormState = {
    name: '',
    identity_type: '',
    identity_number: '',
    email: '',
    phone: '',
    message: '',
};

export default function JoinSection() {
    const [form, setForm] = useState<FormState>(initialState);
    const [feedback, setFeedback] = useState('');
    const [feedbackError, setFeedbackError] = useState(false);
    const [submitting, setSubmitting] = useState(false);
    const [source] = useState(() => detectSource());

    const set = (key: keyof FormState) => (event: { target: { value: string } }) =>
        setForm((current) => ({ ...current, [key]: event.target.value }));

    const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
        event.preventDefault();
        const currentForm = event.currentTarget;

        if (!currentForm.checkValidity()) {
            currentForm.reportValidity();
            return;
        }

        setSubmitting(true);
        setFeedback('');
        setFeedbackError(false);

        try {
            const response = await fetch('/aspirasi', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',
                },
                body: new FormData(currentForm),
            });

            const data: { message?: string; errors?: Record<string, string[]> } = await response.json();
            if (!response.ok) {
                throw new Error(Object.values(data.errors ?? {})[0]?.[0] ?? data.message ?? 'Sila semak semula borang anda.');
            }

            setForm(initialState);
            currentForm.reset();
            setFeedback(data.message ?? 'Aspirasi anda telah diterima.');
        } catch (error) {
            setFeedbackError(true);
            setFeedback(error instanceof Error ? error.message : 'Sila cuba lagi.');
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <section id="sertai" className="join section-pad">
            <div className="container join-grid">
                <div className="join-copy">
                    <h2 className="section-title">SUARA ANDA, TEKAD KAMI</h2>
                    <p className="mengenai-text">Hantar aspirasi anda untuk masa depan Putrajaya yang lebih baik.</p>
                    <a className="join-qr-card" href={baseUrl('/aspirasi/qr')} aria-label="Buka halaman kod QR borang aspirasi">
                        <img src={baseUrl('/aspirasi/qr-image')} alt="Kod QR Borang Aspirasi" width={148} height={148} />
                        <span>
                            <strong>Imbas untuk hantar aspirasi</strong>
                            <small>Buka kod QR dalam paparan penuh &rarr;</small>
                        </span>
                    </a>
                </div>
                <form id="aspiration-form" className="public-form" action="/aspirasi" method="post" noValidate onSubmit={handleSubmit}>
                    <input type="hidden" name="source" value={source} />
                    <div className="form-row">
                        <div className="field">
                            <label htmlFor="name">Nama penuh</label>
                            <input id="name" name="name" required maxLength={255} value={form.name} onChange={set('name')} />
                        </div>
                        <div className="field">
                            <label htmlFor="identity_number">No. kad pengenalan</label>
                            <input
                                id="identity_number"
                                name="identity_number"
                                type="text"
                                inputMode="numeric"
                                autoComplete="off"
                                required
                                minLength={12}
                                maxLength={12}
                                pattern="[0-9]{12}"
                                placeholder="Contoh: 901234145678"
                                title="Masukkan tepat 12 digit tanpa tanda sengkang"
                                value={form.identity_number}
                                onChange={(event) => setForm((current) => ({
                                    ...current,
                                    identity_number: event.target.value.replace(/\D/g, '').slice(0, 12),
                                }))}
                            />
                            <span className="field-hint">Wajib 12 digit tanpa tanda “-”.</span>
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="field">
                            <label htmlFor="identity_type">Jenis kad pengenalan</label>
                            <select id="identity_type" name="identity_type" required value={form.identity_type} onChange={set('identity_type')}>
                                <option value="">— Sila pilih —</option>
                                <option value="MyKad">MyKad</option>
                                <option value="MyTentera">MyTentera</option>
                                <option value="MyPolis">MyPolis</option>
                            </select>
                        </div>
                        <div className="field">
                            <label htmlFor="email">E-mel</label>
                            <input id="email" name="email" type="email" required maxLength={255} value={form.email} onChange={set('email')} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="field full-width">
                            <label htmlFor="phone">No. WhatsApp</label>
                            <input id="phone" name="phone" type="tel" required maxLength={50} value={form.phone} onChange={set('phone')} />
                        </div>
                    </div>
                    <div className="field">
                        <label htmlFor="message">Aspirasi anda</label>
                        <textarea id="message" name="message" required maxLength={1500} value={form.message} onChange={set('message')}></textarea>
                    </div>
                    <LegalConsentFields idPrefix="aspiration" />
                    <button className="btn btn-red" type="submit" disabled={submitting}>Hantar Aspirasi &rarr;</button>
                    <div id="form-feedback" className={`form-feedback${feedback ? ' show' : ''}${feedbackError ? ' error' : ''}`} role="status">{feedback}</div>
                </form>
            </div>
        </section>
    );
}
