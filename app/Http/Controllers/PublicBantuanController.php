<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\Response;

final class PublicBantuanController extends Controller
{
    /**
     * Display the standalone bantuan (aid request) page.
     */
    public function index(): View
    {
        return view('public.bantuan');
    }

    /**
     * Show the QR landing page with styled instructions.
     */
    public function qrPage(): View
    {
        return view('public.bantuan-qr');
    }

    /**
     * Generate a QR code (PNG) that links directly to the bantuan form.
     * Usage: <img src="{{ route('bantuan.qr') }}">
     */
    public function qr(): Response
    {
        $url = route('bantuan.index');

        $svg = QrCode::format('svg')
            ->size(512)
            ->margin(2)
            ->encoding('UTF-8')
            ->generate($url);

        return response($svg, headers: [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
