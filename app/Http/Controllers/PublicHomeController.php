<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PublicHomeViewData;
use Inertia\Inertia;
use Inertia\Response;

final class PublicHomeController extends Controller
{
    public function __invoke(PublicHomeViewData $viewData): Response
    {
        return Inertia::render('Home/Index', $viewData->toArray());
    }
}
