<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

final class PublicAspirasiController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Standalone/Aspirasi', [
            'meta' => [
                'title' => 'Tak Banyak Alasan',
                'description' => 'Terbukti, Terlihat & Terjamin',
                'image' => asset('assets/campaign-tak-banyak-alasan-render.png'),
            ],
        ]);
    }

    public function qrPage(): Response
    {
        return Inertia::render('Aspirasi/QrPage', [
            'meta' => [
                'title' => 'Tak Banyak Alasan',
                'description' => 'Terbukti, Terlihat & Terjamin',
                'image' => asset('assets/campaign-tak-banyak-alasan-render.png'),
            ],
        ]);
    }

    public function qr(): HttpResponse
    {
        $svg = QrCode::format('svg')
            ->size(512)
            ->margin(2)
            ->encoding('UTF-8')
            ->generate(route('aspirasi.index'));

        return response($svg, headers: [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
