<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PublicHomeViewData;
use Inertia\Inertia;
use Inertia\Response;

final class PublicGalleryController extends Controller
{
    public function __invoke(PublicHomeViewData $viewData): Response
    {
        $data = $viewData->toArray();

        return Inertia::render('Gallery/Index', [
            'gallery' => $data['gallery'],
            'settings' => $data['settings'],
        ]);
    }
}
