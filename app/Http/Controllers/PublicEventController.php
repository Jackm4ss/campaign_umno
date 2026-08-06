<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CampaignEventContent;
use Inertia\Inertia;
use Inertia\Response;

final class PublicEventController extends Controller
{
    public function show(string $slug): Response
    {
        $event = CampaignEventContent::query()
            ->published()
            ->bySlug($slug)
            ->firstOrFail();

        $siblings = CampaignEventContent::query()
            ->published()
            ->where('slug', '!=', $slug)
            ->ordered()
            ->get(['slug', 'title'])
            ->map(fn (CampaignEventContent $e) => ['slug' => $e->slug, 'title' => $e->title])
            ->values()
            ->all();

        return Inertia::render('Event/Show', [
            'event' => [
                'id' => $event->id,
                'slug' => $event->slug,
                'title' => $event->title,
                'date_label' => $event->date_label,
                'place' => $event->place,
                'short_desc' => $event->short_desc,
                'image_url' => $event->getFirstMediaUrl('banner', 'webp')
                    ?: ($event->image_path ? asset($event->image_path) : asset('assets/event-1.jpg')),
                'lead' => $event->lead,
                'sections' => $event->sections ?? [],
                'cta' => $event->cta ?? [],
            ],
            'siblings' => $siblings,
            'settings' => [],
        ]);
    }
}
