@extends('layouts.public')

@section('content')
<section class="bantuan-page section-pad">
    <div class="container bantuan-container">
        <div class="bantuan-card-shell">
            {{--
              Colabs-style corner: page-coloured pad + black circle + two SVG fillets.
              Pattern reverse-engineered from https://colabs.com.au/ .Button_ArrowCont
            --}}
            <a href="{{ route('home') }}" class="bantuan-card-back" title="Kembali ke Laman Utama">
                <span class="bantuan-back-pad">
                    <svg class="bantuan-back-fillet bantuan-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                    <span class="bantuan-back-circle">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    </span>
                    <svg class="bantuan-back-fillet bantuan-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
                </span>
            </a>

        <div class="bantuan-card-wrap">

            {{-- Header inside card --}}
            <div class="bantuan-card-header">
                <span class="section-label">Bantuan Rakyat</span>
                <h1 class="section-title bantuan-title">BORANG BANTUAN</h1>
                <p class="bantuan-intro">Jika anda memerlukan bantuan, sila lengkapkan borang di bawah. Data anda akan diterima oleh pentadbir UMNO Putrajaya untuk tindakan lanjut.</p>
            </div>

            <hr>

        <form id="bantuan-form" class="public-form bantuan-form" action="{{ route('members.store') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- Section 1: Personal Data --}}
            <div class="bantuan-section">
                <h3 class="bantuan-section-title">Maklumat Diri</h3>
                <div class="form-row">
                    <div class="field">
                        <label for="full_name">Nama Penuh</label>
                        <input id="full_name" name="full_name" required maxlength="255">
                    </div>
                    <div class="field">
                        <label for="identity_number">No. Kad Pengenalan</label>
                        <input id="identity_number" name="identity_number" required maxlength="50" placeholder="contoh: 901234-14-5678">
                    </div>
                </div>
                <div class="form-row">
                    <div class="field">
                        <label for="identity_type">Jenis Kad Pengenalan</label>
                        <select id="identity_type" name="identity_type" required>
                            <option value="">— Sila pilih —</option>
                            <option value="MyKad">MyKad</option>
                            <option value="MyTentera">MyTentera</option>
                            <option value="MyPolis">MyPolis</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="birth_date">Tarikh Lahir</label>
                        <input id="birth_date" name="birth_date" type="text" placeholder="Pilih tarikh lahir" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="field">
                        <label for="phone">No. Telefon</label>
                        <input id="phone" name="phone" type="tel" required maxlength="50">
                    </div>
                    <div class="field">
                        <label for="email">E-mel</label>
                        <input id="email" name="email" type="email" required maxlength="255">
                    </div>
                </div>
                <div class="form-row">
                    <div class="field full-width">
                        <label for="email_confirmation">Sahkan E-mel</label>
                        <input id="email_confirmation" name="email_confirmation" type="email" required maxlength="255">
                    </div>
                </div>
                <div class="field">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" required rows="2"></textarea>
                    <span class="field-hint">Wilayah Persekutuan Putrajaya sahaja</span>
                </div>
                <div class="form-row">
                    <div class="field">
                        <label for="presint">Presint</label>
                        <select id="presint" name="presint" required>
                            <option value="">— Sila pilih —</option>
                            @for ($i = 1; $i <= 17; $i++)
                                <option value="Presint {{ $i }}">Presint {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="field">
                        <label for="photo">Gambar (Opsional)</label>
                        <input id="photo" name="photo" type="file" accept="image/jpeg,image/png" class="file-input">
                    </div>
                </div>
            </div>

            {{-- Section 2: Aid Type --}}
            <div class="bantuan-section">
                <h3 class="bantuan-section-title">Jenis Bantuan</h3>
                <p class="bantuan-section-desc">Pilih satu jenis bantuan yang diperlukan.</p>
                <div class="aid-section-body">
                    <div class="aid-options">
                    <label class="aid-option" data-aid="katil_hospital">
                        <input type="radio" name="aid_types[]" value="katil_hospital" class="aid-radio">
                        <div class="aid-option-card">
                            <div class="aid-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6"/><path d="M3 18h18"/><path d="M7 10V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4"/></svg>
                            </div>
                            <div class="aid-body">
                                <h4>Katil Hospital</h4>
                                <p>Bantuan kos rawatan katil hospital</p>
                            </div>
                        </div>
                    </label>
                    <label class="aid-option" data-aid="makanan_asas">
                        <input type="radio" name="aid_types[]" value="makanan_asas" class="aid-radio">
                        <div class="aid-option-card">
                            <div class="aid-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11h18l-1.5 9a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2L3 11z"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </div>
                            <div class="aid-body">
                                <h4>Makanan Asas</h4>
                                <p>Bantuan barang keperluan asas (sembako)</p>
                            </div>
                        </div>
                    </label>
                    <label class="aid-option" data-aid="wang_tunai_rm_300">
                        <input type="radio" name="aid_types[]" value="wang_tunai_rm_300" class="aid-radio">
                        <div class="aid-option-card">
                            <div class="aid-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg>
                            </div>
                            <div class="aid-body">
                                <h4>Wang Tunai RM300</h4>
                                <p>Bantuan wang tunai sebanyak RM300</p>
                            </div>
                        </div>
                    </label>
                </div>

                {{-- Conditional: Patient fields for katil_hospital --}}
                <div class="aid-conditional" id="aid-patient-fields" hidden>
                    <h4 class="bantuan-subsection-title">Maklumat Pesakit</h4>
                    <div class="form-row">
                        <div class="field">
                            <label for="patient_name">Nama Pesakit</label>
                            <input id="patient_name" name="patient_name" maxlength="255">
                        </div>
                        <div class="field">
                            <label for="patient_identity_number">No. KP Pesakit</label>
                            <input id="patient_identity_number" name="patient_identity_number" maxlength="50">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="field">
                            <label for="patient_phone">No. Telefon Pesakit</label>
                            <input id="patient_phone" name="patient_phone" type="tel" maxlength="50">
                        </div>
                        <div class="field">
                            <label for="patient_address">Alamat Pesakit</label>
                            <textarea id="patient_address" name="patient_address" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                </div>{{-- .aid-section-body --}}
            </div>

            {{-- Section 3: Verification --}}
            <div class="bantuan-section">
                <h3 class="bantuan-section-title">Pengesahan</h3>
                <div class="field">
                    <label for="voter_proof">Bukti Daftar Pemilih (Screenshot)</label>
                    <input id="voter_proof" name="voter_proof" type="file" accept="image/jpeg,image/png,application/pdf" class="file-input">
                    <span class="field-hint">Sila muat naik tangkap layar daftar pemilih dari portal SPR</span>
                </div>
                <div class="field bantuan-terms">
                    <label class="checkbox-label">
                        <input type="checkbox" id="terms" required>
                        <span>Saya mengaku bahawa semua maklumat di atas adalah benar dan saya bersetuju dengan terma dan syarat serta polisi privasi (PDPA).</span>
                    </label>
                </div>
            </div>

            <button class="btn btn-red btn-lg bantuan-submit" type="submit">Hantar Borang Bantuan &rarr;</button>
            <div id="form-feedback" class="form-feedback" role="status"></div>
        </form>

        </div>{{-- .bantuan-card-wrap --}}
        </div>{{-- .bantuan-card-shell --}}

        {{-- Success state (hidden, shown by JS) --}}
        <div class="bantuan-success" id="bantuan-success" hidden>
            <div class="bantuan-success-icon">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <h2 class="section-title">DATA ANDA DITERIMA</h2>
            <p class="bantuan-success-text">Terima kasih. Permohonan bantuan anda telah diterima. Pentadbir akan menghubungi anda untuk tindakan lanjut.</p>
            <a href="{{ route('home') }}" class="btn btn-blue btn-lg">Kembali ke Laman Utama &rarr;</a>
        </div>
    </div>
</section>

{{-- Confirmation Modal --}}
<div class="bantuan-modal-backdrop" id="bantuan-confirm-modal">
    <div class="bantuan-modal">
        <div class="bantuan-modal-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
        </div>
        <h3 class="bantuan-modal-title">Sahkan Penghantaran</h3>
        <p class="bantuan-modal-desc">Pastikan semua maklumat yang anda isi adalah betul. Klik "Ya, Hantar" untuk menghantar borang.</p>
        <div class="bantuan-modal-actions">
            <button class="btn btn-outline bantuan-modal-cancel" type="button" id="bantuan-cancel">Batal</button>
            <button class="btn btn-red bantuan-modal-confirm" type="button" id="bantuan-confirm">Ya, Hantar &rarr;</button>
        </div>
    </div>
</div>
@endsection

@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    flatpickr('#birth_date', {
        dateFormat: 'Y-m-d',
        altInput: true,
        altFormat: 'j F Y',
        maxDate: 'today',
        locale: {
            months: {
                shorthand: ['Jan','Feb','Mac','Apr','Mei','Jun','Jul','Ogo','Sep','Okt','Nov','Dis'],
                longhand: ['Januari','Februari','Mac','April','Mei','Jun','Julai','Ogos','September','Oktober','November','Disember']
            },
            weekdays: {
                shorthand: ['Ahd','Isn','Sel','Rab','Kha','Jum','Sab'],
                longhand: ['Ahad','Isnin','Selasa','Rabu','Khamis','Jumaat','Sabtu']
            }
        }
    });
});
</script>
@endpush
