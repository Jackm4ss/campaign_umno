import { FormEvent, useState } from 'react';

interface FormState {
    name: string;
    identity_number: string;
    email: string;
    phone: string;
    message: string;
}

const initialState: FormState = {
    name: '',
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

    const set = (key: keyof FormState) => (event: { target: { value: string } }) =>
        setForm((current) => ({ ...current, [key]: event.target.value }));

    const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
        event.preventDefault();
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
                body: new FormData(event.currentTarget),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error(Object.values(data.errors ?? {})[0]?.[0] ?? data.message ?? 'Sila semak semula borang anda.');
            }

            setForm(initialState);
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
                    <span className="section-label">Sertai Gerakan</span>
                    <h2 className="section-title">SUARA ANDA, TEKAD KAMI</h2>
                    <p className="mengenai-text">Hantar aspirasi anda untuk masa depan Putrajaya yang lebih baik.</p>
                </div>
                <form id="aspiration-form" className="public-form" action="/aspirasi" method="post" noValidate onSubmit={handleSubmit}>
                    <div className="form-row">
                        <div className="field">
                            <label htmlFor="name">Nama penuh</label>
                            <input id="name" name="name" required maxLength={255} value={form.name} onChange={set('name')} />
                        </div>
                        <div className="field">
                            <label htmlFor="identity_number">No. kad pengenalan</label>
                            <input id="identity_number" name="identity_number" required maxLength={50} value={form.identity_number} onChange={set('identity_number')} />
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="field">
                            <label htmlFor="email">E-mel</label>
                            <input id="email" name="email" type="email" required maxLength={255} value={form.email} onChange={set('email')} />
                        </div>
                        <div className="field">
                            <label htmlFor="phone">No. telefon</label>
                            <input id="phone" name="phone" required maxLength={50} value={form.phone} onChange={set('phone')} />
                        </div>
                    </div>
                    <div className="field">
                        <label htmlFor="message">Aspirasi anda</label>
                        <textarea id="message" name="message" required maxLength={1500} value={form.message} onChange={set('message')}></textarea>
                    </div>
                    <button className="btn btn-red" type="submit" disabled={submitting}>Hantar Aspirasi &rarr;</button>
                    <div id="form-feedback" className={`form-feedback${feedback ? ' show' : ''}${feedbackError ? ' error' : ''}`} role="status">{feedback}</div>
                </form>
            </div>
        </section>
    );
}
