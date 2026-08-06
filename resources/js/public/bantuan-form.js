export function initBantuanForm() {
    const form = document.getElementById('bantuan-form');
    if (!form) return;

    const feedback = document.getElementById('form-feedback');
    const modal = document.getElementById('bantuan-confirm-modal');
    const btnCancel = document.getElementById('bantuan-cancel');
    const btnConfirm = document.getElementById('bantuan-confirm');
    const successDiv = document.getElementById('bantuan-success');
    const submitBtn = form.querySelector('button[type="submit"]');

    // --- Aid type conditional fields ---
    const aidRadios = form.querySelectorAll('.aid-radio');
    const patientFields = document.getElementById('aid-patient-fields');
    const patientInputs = [
        form.querySelector('#patient_name'),
        form.querySelector('#patient_identity_number'),
        form.querySelector('#patient_phone'),
        form.querySelector('#patient_address'),
    ].filter(Boolean);

    function setPatientFieldsRequired(required) {
        patientInputs.forEach((input) => {
            input.required = required;
            if (!required) {
                input.setCustomValidity('');
            }
        });
    }

    function syncPatientFields() {
        const selected = form.querySelector('.aid-radio:checked');
        const needsPatient = selected?.value === 'katil_hospital_kerusi_roda';
        if (patientFields) {
            patientFields.hidden = !needsPatient;
        }
        setPatientFieldsRequired(Boolean(needsPatient));
    }

    aidRadios.forEach((radio) => {
        radio.addEventListener('change', () => {
            const option = radio.closest('.aid-option');
            form.querySelectorAll('.aid-option').forEach((o) => o.classList.remove('selected'));
            option.classList.add('selected');
            syncPatientFields();
        });
    });
    syncPatientFields();

    // --- Email match validation ---
    const email = form.querySelector('#email');
    const emailConf = form.querySelector('#email_confirmation');

    emailConf?.addEventListener('input', () => {
        if (email.value && emailConf.value && email.value !== emailConf.value) {
            emailConf.setCustomValidity('E-mel tidak sepadan.');
        } else {
            emailConf.setCustomValidity('');
        }
    });

    // --- Form submit → confirmation modal ---
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // Clear previous feedback
        feedback.className = 'form-feedback';
        feedback.textContent = '';

        // Validate email match
        if (email.value !== emailConf.value) {
            showFeedback('E-mel dan pengesahan e-mel tidak sepadan.', true);
            emailConf.focus();
            return;
        }

        // Validate aid type selection
        const aidSelected = form.querySelector('.aid-radio:checked');
        if (!aidSelected) {
            showFeedback('Sila pilih jenis bantuan.', true);
            return;
        }

        // Validate terms checkbox
        const terms = form.querySelector('#terms');
        if (!terms.checked) {
            showFeedback('Sila setujui terma dan syarat.', true);
            return;
        }

        // Native validation (required fields, email format, etc.)
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Show confirmation modal
        modal?.classList.add('open');
        document.body.style.overflow = 'hidden';
    });

    // --- Modal interactions ---
    btnCancel?.addEventListener('click', closeModal);
    modal?.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });

    function closeModal() {
        modal?.classList.remove('open');
        document.body.style.overflow = '';
    }

    // --- Confirm → AJAX submit ---
    btnConfirm?.addEventListener('click', async () => {
        closeModal();
        submitBtn.disabled = true;
        submitBtn.textContent = 'Menghantar...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                },
                body: new FormData(form),
            });

            const data = await response.json();
            if (!response.ok) throw new Error(Object.values(data.errors ?? {})[0]?.[0] ?? data.message ?? 'Sila semak semula borang anda.');

            // Show success state
            form.hidden = true;
            if (successDiv) successDiv.hidden = false;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } catch (error) {
            showFeedback(error instanceof Error ? error.message : 'Sila cuba lagi.', true);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Hantar Borang Bantuan &rarr;';
        }
    });

    function showFeedback(message, isError = false) {
        if (!feedback) return;
        feedback.className = 'form-feedback show';
        if (isError) feedback.classList.add('error');
        feedback.textContent = message;
    }
}
