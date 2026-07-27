<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PublicHomeViewData;
use Illuminate\Contracts\View\View;

final class PublicGalleryController extends Controller
{
    public function __invoke(PublicHomeViewData $viewData): View
    {
        return view('public.gallery', $viewData->toArray());
    }
}
