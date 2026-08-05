<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\CampaignEvents;
use Illuminate\Contracts\View\View;

final class PublicEventController extends Controller
{
    public function show(string $slug): View
    {
        $event = CampaignEvents::find($slug);

        abort_if($event === null, 404);

        return view('public.event-show', [
            'event' => $event,
            'siblings' => CampaignEvents::siblings($slug),
            'settings' => [],
        ]);
    }
}
