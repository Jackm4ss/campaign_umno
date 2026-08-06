<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

final class PublicBantuanController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Bantuan/Index');
    }

    public function qrPage(): Response
    {
        return Inertia::render('Bantuan/QrPage');
    }

    public function qr(): HttpResponse
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
