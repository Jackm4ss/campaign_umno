@extends('layouts.public')

@section('content')
<section class="bantuan-qr-page">
    <div class="bantuan-qr-container">
        <div class="bantuan-qr-card">
            <div class="bantuan-qr-header">
                <span class="section-label">Bantuan Rakyat</span>
                <h1 class="bantuan-qr-title">Imbas Kod QR Ini</h1>
                <p class="bantuan-qr-subtitle">Imbas kod QR di atas untuk membuka borang bantuan di telefon anda. Borang ini disediakan oleh UMNO Putrajaya untuk warga Wilayah Persekutuan Putrajaya.</p>
            </div>

            <div class="bantuan-qr-image-wrap">
                <img src="{{ route('bantuan.qr') }}" alt="Kod QR Borang Bantuan" class="bantuan-qr-image">
                <div class="bantuan-qr-glow"></div>
            </div>

            <div class="bantuan-qr-instructions">
                <div class="bantuan-qr-step">
                    <span class="bantuan-qr-step-number">1</span>
                    <p>Buka kamera atau aplikasi imbasan QR pada telefon anda.</p>
                </div>
                <div class="bantuan-qr-step">
                    <span class="bantuan-qr-step-number">2</span>
                    <p>Arahkan kepada kod QR di atas sehingga kod dikenal pasti.</p>
                </div>
                <div class="bantuan-qr-step">
                    <span class="bantuan-qr-step-number">3</span>
                    <p>Klik pautan untuk membuka borang dan isi maklumat dengan lengkap.</p>
                </div>
            </div>

            <a href="{{ route('bantuan.index') }}" class="btn btn-red btn-lg bantuan-qr-cta">
                Buka Borang Bantuan
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>

            <a href="{{ route('home') }}" class="btn btn-blue btn-lg bantuan-qr-home">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
