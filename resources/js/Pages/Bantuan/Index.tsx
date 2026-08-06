import { Head } from '@inertiajs/react';
import { FormEvent, memo, useEffect, useRef, useState } from 'react';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import Swal from 'sweetalert2';
import PublicLayout from '../../Layouts/PublicLayout';
import { detectSource } from '../../lib/source';

/**
 * Flatpickr owns this DOM entirely: the input is created imperatively so
 * React never re-reconciles it. This prevents the duplicate-input bug
 * where parent re-renders (aid type selection, etc.) would restore the
 * hidden original input next to flatpickr's visible alt input.
 */
const BirthDatePicker = memo(function BirthDatePicker() {
    const containerRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        const container = containerRef.current;
        if (!container) return;

        const input = document.createElement('input');
        input.type = 'text';
        input.id = 'birth_date';
        input.name = 'birth_date';
        input.placeholder = 'Pilih tarikh lahir';
        input.autocomplete = 'off';
        input.required = true;
        container.appendChild(input);

        const instance = flatpickr(input, {
            dateFormat: 'Y-m-d',
            altInput: true,
            altFormat: 'j F Y',
            maxDate: 'today',
            locale: {
                months: {
                    shorthand: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogo', 'Sep', 'Okt', 'Nov', 'Dis'],
                    longhand: ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'],
                },
                weekdays: {
                    shorthand: ['Ahd', 'Isn', 'Sel', 'Rab', 'Kha', 'Jum', 'Sab'],
                    longhand: ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'],
                },
            },
        });

        return () => {
            (Array.isArray(instance) ? instance : [instance]).forEach((i) => i.destroy());
            input.remove();
        };
    }, []);

    return <div ref={containerRef}></div>;
});

const aidOptions = [
    {
        value: 'keperluan_asas_dapur',
        title: 'Keperluan Asas Dapur',
        icon: (
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M3 11h18l-1.5 9a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2L3 11z" /><path d="M7 11V7a5 5 0 0 1 10 0v4" /></svg>
        ),
    },
    {
        value: 'wang_tunai',
        title: 'Bantuan Wang Tunai',
        icon: (
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><rect x="2" y="6" width="20" height="12" rx="2" /><circle cx="12" cy="12" r="2" /><path d="M6 12h.01M18 12h.01" /></svg>
        ),
    },
    {
        value: 'katil_hospital_kerusi_roda',
        title: 'Katil Hospital / Kerusi Roda',
        icon: (
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M3 18v-6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6" /><path d="M3 18h18" /><path d="M7 10V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4" /></svg>
        ),
    },
    {
        value: 'van_jenazah_percuma',
        title: 'Van Jenazah Percuma',
        icon: (
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M3 17V7a2 2 0 0 1 2-2h9l5 5v7" /><path d="M3 17h2" /><path d="M14 17h5" /><circle cx="7.5" cy="17.5" r="2.5" /><circle cx="17.5" cy="17.5" r="2.5" /></svg>
        ),
    },
    {
        value: 'kad_kesihatan_kunan',
        title: 'Kad Kesihatan KuNan',
        icon: (
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><rect x="2" y="5" width="20" height="14" rx="2" /><path d="M2 10h20" /><path d="M6 15h4" /></svg>
        ),
    },
];

export default function BantuanIndex() {
    const formRef = useRef<HTMLFormElement>(null);
    const [aidType, setAidType] = useState('');
    const [modalOpen, setModalOpen] = useState(false);
    const [success, setSuccess] = useState(false);
    const [feedback, setFeedback] = useState('');
    const [feedbackError, setFeedbackError] = useState(false);
    const [submitting, setSubmitting] = useState(false);
    const [source] = useState(() => detectSource());

    const needsPatient = aidType === 'katil_hospital_kerusi_roda';

    useEffect(() => {
        if (!modalOpen) return;
        document.body.style.overflow = 'hidden';
        const onKey = (event: KeyboardEvent) => {
            if (event.key === 'Escape') setModalOpen(false);
        };
        document.addEventListener('keydown', onKey);
        return () => {
            document.body.style.overflow = '';
            document.removeEventListener('keydown', onKey);
        };
    }, [modalOpen]);

    const showFeedback = (message: string, isError = false) => {
        setFeedback(message);
        setFeedbackError(isError);
    };

    const handleSubmit = (event: FormEvent<HTMLFormElement>) => {
        event.preventDefault();
        const form = formRef.current;
        if (!form) return;

        setFeedback('');
        setFeedbackError(false);

        if (!aidType) {
            showFeedback('Sila pilih jenis bantuan.', true);
            return;
        }

        const terms = form.querySelector('#terms') as HTMLInputElement;
        if (!terms.checked) {
            showFeedback('Sila setujui terma dan syarat.', true);
            return;
        }

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        setModalOpen(true);
    };

    const confirmSubmit = async () => {
        const form = formRef.current;
        if (!form) return;

        setModalOpen(false);
        setSubmitting(true);

        try {
            const response = await fetch('/daftar', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',
                },
                body: new FormData(form),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error(Object.values(data.errors ?? {})[0]?.[0] ?? data.message ?? 'Sila semak semula borang anda.');
            }

            setSuccess(true);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Tidak Dapat Dihantar',
                text: error instanceof Error ? error.message : 'Sila cuba lagi.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#CC1A1A',
            });
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <PublicLayout>
            <Head title="Borang Bantuan - Tak Banyak Alasan" />
            <section className="bantuan-page section-pad">
                <div className="container bantuan-container">
                    <div className="bantuan-card-shell">
                        <a href="/" className="bantuan-card-back" title="Kembali ke Laman Utama">
                            <span className="bantuan-back-pad">
                                <svg className="bantuan-back-fillet bantuan-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                                <span className="bantuan-back-circle">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7" /></svg>
                                </span>
                                <svg className="bantuan-back-fillet bantuan-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                            </span>
                        </a>

                        <div className="bantuan-card-wrap">
                            <div className="bantuan-card-header">
                                <span className="section-label">Bantuan Rakyat</span>
                                <h1 className="section-title bantuan-title">BORANG BANTUAN</h1>
                                <p className="bantuan-intro">Sila lengkapkan borang di bawah. Permohonan anda akan diproses dalam tempoh lima (5) hari bekerja. Admin akan berhubung semula melalui E-Mel atau Whatsapp jika permohonan diluluskan.</p>
                            </div>

                            <hr />

                            <form id="bantuan-form" className="public-form bantuan-form" action="/daftar" method="post" encType="multipart/form-data" noValidate ref={formRef} onSubmit={handleSubmit} hidden={success}>
                                <input type="hidden" name="source" value={source} />
                                {/* Section 1: Personal Data */}
                                <div className="bantuan-section">
                                    <h3 className="bantuan-section-title">Maklumat Diri</h3>
                                    <div className="form-row">
                                        <div className="field">
                                            <label htmlFor="full_name">Nama Penuh</label>
                                            <input id="full_name" name="full_name" required maxLength={255} />
                                        </div>
                                        <div className="field">
                                            <label htmlFor="identity_number">No. Kad Pengenalan</label>
                                            <input id="identity_number" name="identity_number" required maxLength={50} placeholder="contoh: 901234-14-5678" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="field">
                                            <label htmlFor="identity_type">Jenis Kad Pengenalan</label>
                                            <select id="identity_type" name="identity_type" required defaultValue="">
                                                <option value="">— Sila pilih —</option>
                                                <option value="MyKad">MyKad</option>
                                                <option value="MyTentera">MyTentera</option>
                                                <option value="MyPolis">MyPolis</option>
                                            </select>
                                        </div>
                                        <div className="field">
                                            <label htmlFor="birth_date">Tarikh Lahir</label>
                                            <BirthDatePicker />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="field">
                                            <label htmlFor="phone">No. Telefon</label>
                                            <input id="phone" name="phone" type="tel" required maxLength={50} />
                                        </div>
                                        <div className="field">
                                            <label htmlFor="email">E-mel</label>
                                            <input id="email" name="email" type="email" required maxLength={255} />
                                        </div>
                                    </div>
                                    <div className="field">
                                        <label htmlFor="address">Alamat</label>
                                        <textarea id="address" name="address" required rows={2}></textarea>
                                        <span className="field-hint">Wilayah Persekutuan Putrajaya sahaja</span>
                                    </div>
                                    <div className="form-row">
                                        <div className="field">
                                            <label htmlFor="presint">Presint</label>
                                            <select id="presint" name="presint" required defaultValue="">
                                                <option value="">— Sila pilih —</option>
                                                {Array.from({ length: 17 }, (_, i) => i + 1).map((i) => (
                                                    <option key={i} value={`Presint ${i}`}>Presint {i}</option>
                                                ))}
                                            </select>
                                        </div>
                                        <div className="field">
                                            <label htmlFor="photo">Gambar (Opsional)</label>
                                            <input id="photo" name="photo" type="file" accept="image/jpeg,image/png" className="file-input" />
                                        </div>
                                    </div>
                                </div>

                                {/* Section 2: Aid Type */}
                                <div className="bantuan-section">
                                    <h3 className="bantuan-section-title">Jenis Bantuan</h3>
                                    <p className="bantuan-section-desc">Pilih satu jenis bantuan yang diperlukan.</p>
                                    <div className="aid-section-body">
                                        <div className="aid-options">
                                            {aidOptions.map((option) => (
                                                <label key={option.value} className={`aid-option${aidType === option.value ? ' selected' : ''}`} data-aid={option.value}>
                                                    <input
                                                        type="radio"
                                                        name="aid_types[]"
                                                        value={option.value}
                                                        className="aid-radio"
                                                        checked={aidType === option.value}
                                                        onChange={() => setAidType(option.value)}
                                                    />
                                                    <div className="aid-option-card">
                                                        <div className="aid-icon">{option.icon}</div>
                                                        <div className="aid-body">
                                                            <h4>{option.title}</h4>
                                                        </div>
                                                    </div>
                                                </label>
                                            ))}
                                        </div>

                                        {/* Conditional: Patient fields for hospital / wheelchair aid */}
                                        <div className="aid-conditional" id="aid-patient-fields" hidden={!needsPatient}>
                                            <h4 className="bantuan-subsection-title">Maklumat Pesakit</h4>
                                            <div className="form-row">
                                                <div className="field">
                                                    <label htmlFor="patient_name">Nama Pesakit</label>
                                                    <input id="patient_name" name="patient_name" maxLength={255} required={needsPatient} />
                                                </div>
                                                <div className="field">
                                                    <label htmlFor="patient_identity_number">No. KP Pesakit</label>
                                                    <input id="patient_identity_number" name="patient_identity_number" maxLength={50} required={needsPatient} />
                                                </div>
                                            </div>
                                            <div className="form-row">
                                                <div className="field">
                                                    <label htmlFor="patient_phone">No. Telefon Pesakit</label>
                                                    <input id="patient_phone" name="patient_phone" type="tel" maxLength={50} required={needsPatient} />
                                                </div>
                                                <div className="field">
                                                    <label htmlFor="patient_address">Alamat Pesakit</label>
                                                    <textarea id="patient_address" name="patient_address" rows={2} required={needsPatient}></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {/* Section 3: Verification */}
                                <div className="bantuan-section">
                                    <h3 className="bantuan-section-title">Pengesahan</h3>
                                    <div className="field">
                                        <label htmlFor="voter_proof">Bukti Daftar Pemilih (Screenshot)</label>
                                        <input id="voter_proof" name="voter_proof" type="file" accept="image/jpeg,image/png,application/pdf" className="file-input" />
                                        <span className="field-hint">Sila muat naik tangkap layar daftar pemilih dari portal SPR</span>
                                    </div>
                                    <div className="field bantuan-terms">
                                        <label className="checkbox-label" htmlFor="terms">
                                            <input type="checkbox" id="terms" required />
                                            <span className="checkbox-copy">Saya mengaku bahawa semua maklumat di atas adalah benar dan saya bersetuju dengan terma dan syarat serta polisi privasi (PDPA).</span>
                                        </label>
                                    </div>
                                </div>

                                <button className="btn btn-red btn-lg bantuan-submit" type="submit" disabled={submitting}>
                                    <span className="bantuan-submit-label">{submitting ? 'Menghantar...' : 'Hantar Borang Bantuan'}</span>
                                    <span className="bantuan-submit-arrow" aria-hidden="true">&rarr;</span>
                                </button>
                                <div id="form-feedback" className={`form-feedback${feedback ? ' show' : ''}${feedbackError ? ' error' : ''}`} role="status">{feedback}</div>
                            </form>
                        </div>
                    </div>

                    {/* Success state */}
                    <div className="bantuan-success" id="bantuan-success" hidden={!success}>
                        <div className="bantuan-success-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>
                        </div>
                        <h2 className="section-title">DATA ANDA DITERIMA</h2>
                        <p className="bantuan-success-text">Terima kasih. Permohonan bantuan anda telah diterima. Pentadbir akan menghubungi anda untuk tindakan lanjut.</p>
                        <a href="/" className="btn btn-blue btn-lg">Kembali ke Laman Utama &rarr;</a>
                    </div>
                </div>
            </section>

            {/* Confirmation Modal */}
            <div className={`bantuan-modal-backdrop${modalOpen ? ' open' : ''}`} id="bantuan-confirm-modal" onClick={(event) => { if (event.target === event.currentTarget) setModalOpen(false); }}>
                <div className="bantuan-modal">
                    <div className="bantuan-modal-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><circle cx="12" cy="12" r="10" /><path d="M12 16v-4M12 8h.01" /></svg>
                    </div>
                    <h3 className="bantuan-modal-title">Sahkan Penghantaran</h3>
                    <p className="bantuan-modal-desc">Pastikan semua maklumat yang anda isi adalah betul. Klik "Ya, Hantar" untuk menghantar borang.</p>
                    <div className="bantuan-modal-actions">
                        <button className="btn btn-outline bantuan-modal-cancel" type="button" onClick={() => setModalOpen(false)}>Batal</button>
                        <button className="btn btn-red bantuan-modal-confirm" type="button" onClick={confirmSubmit}>Ya, Hantar &rarr;</button>
                    </div>
                </div>
            </div>
        </PublicLayout>
    );
}
