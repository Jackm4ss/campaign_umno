<x-filament-panels::page.simple>
    @push('styles')
    <style>
        /* ── Neubrutalism Login ── */

        /* Card */
        .fi-simple-main {
            background: #FFFFFF !important;
            border: 3px solid #1A1A2E !important;
            border-radius: 0 !important;
            box-shadow: 8px 8px 0 #1A1A2E !important;
            max-width: 420px !important;
            padding: 2.5rem !important;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .fi-simple-main:hover {
            box-shadow: 11px 11px 0 #1A1A2E !important;
            transform: translate(-1.5px, -1.5px);
        }

        /* Hide default Filament logo */
        .fi-logo,
        .fi-simple-header .fi-logo {
            display: none !important;
        }

        /* Custom header */
        .fi-simple-header,
        .fi-simple-header * {
            text-align: left !important;
            justify-content: flex-start !important;
            align-items: flex-start !important;
        }
        .nb-logo {
            display: block;
            width: min(200px, 65%);
            height: auto;
            margin: 0 0 20px;
        }
        .nb-title {
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 26px;
            font-weight: 900;
            color: #1A1A2E;
            line-height: 1.1;
            letter-spacing: -0.5px;
        }
        .nb-title span { color: #CC1A1A; }
        .nb-desc {
            font-size: 13px;
            color: #555566;
            margin-top: 8px;
            line-height: 1.5;
        }
        .nb-separator {
            border: none;
            border-top: 3px solid #1A1A2E;
            margin: 20px 0;
        }

        /* Labels */
        .fi-simple-main .fi-fo-field-wrp-label label {
            font-weight: 700 !important;
            font-size: 11px !important;
            letter-spacing: 1.5px !important;
            text-transform: uppercase !important;
            color: #1A1A2E !important;
        }

        /* Input wrappers */
        .fi-simple-main .fi-input-wrp {
            border: 2.5px solid #1A1A2E !important;
            border-radius: 0 !important;
            box-shadow: 4px 4px 0 #1A1A2E !important;
            transition: box-shadow 0.15s, transform 0.15s, border-color 0.15s;
            background: #fff !important;
            overflow: hidden;
        }
        .fi-simple-main .fi-input-wrp:focus-within {
            box-shadow: 6px 6px 0 #CC1A1A !important;
            border-color: #CC1A1A !important;
            transform: translate(-1px, -1px);
        }
        .fi-simple-main input.fi-input {
            border: none !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            font-weight: 600 !important;
            font-size: 14px !important;
        }

        /* Checkbox */
        .fi-simple-main .fi-checkbox-input {
            border: 2.5px solid #1A1A2E !important;
            border-radius: 0 !important;
        }
        .fi-simple-main .fi-checkbox-input:checked {
            background-color: #CC1A1A !important;
            border-color: #1A1A2E !important;
        }

        /* Submit button */
        .fi-simple-main .fi-btn-primary {
            background: #CC1A1A !important;
            border: 3px solid #1A1A2E !important;
            border-radius: 0 !important;
            box-shadow: 5px 5px 0 #1A1A2E !important;
            font-weight: 800 !important;
            font-size: 12px !important;
            letter-spacing: 2.5px !important;
            text-transform: uppercase !important;
            padding: 14px 24px !important;
            transition: all 0.12s !important;
            color: #fff !important;
        }
        .fi-simple-main .fi-btn-primary:hover {
            background: #A01414 !important;
            box-shadow: 7px 7px 0 #1A1A2E !important;
            transform: translate(-2px, -2px) !important;
        }
        .fi-simple-main .fi-btn-primary:active {
            box-shadow: 2px 2px 0 #1A1A2E !important;
            transform: translate(2px, 2px) !important;
        }

        /* Back link */
        .nb-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #555566;
            text-decoration: none;
            transition: color 0.15s;
            margin-top: 24px;
        }
        .nb-back:hover { color: #CC1A1A; }
        .nb-back svg { flex-shrink: 0; }

        /* Responsive */
        @media (max-width: 640px) {
            .fi-simple-main {
                margin: 16px !important;
                padding: 1.75rem !important;
            }
        }
    </style>
    @endpush

    <x-slot name="heading">
        <img src="{{ asset('assets/admin-logo-blue.png') }}" alt="Tak Banyak Alasan" class="nb-logo">
        <div class="nb-title">Log <span>Masuk</span></div>
        <p class="nb-desc">Masukkan e-mel dan kata laluan untuk mengakses panel pentadbir.</p>
        <hr class="nb-separator">
    </x-slot>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::form id="form" wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}

    <div style="text-align:center;">
        <a href="{{ config('app.url') }}" class="nb-back">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Laman Utama
        </a>
    </div>
</x-filament-panels::page.simple>
