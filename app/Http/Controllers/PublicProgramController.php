<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Program;
use Inertia\Inertia;
use Inertia\Response;

final class PublicProgramController extends Controller
{
    public function show(string $slug): Response
    {
        $program = Program::query()
            ->published()
            ->bySlug($slug)
            ->firstOrFail();

        $siblings = Program::query()
            ->published()
            ->where('slug', '!=', $slug)
            ->ordered()
            ->get(['slug', 'title'])
            ->map(fn (Program $p) => ['slug' => $p->slug, 'title' => $p->title])
            ->values()
            ->all();

        return Inertia::render('Program/Show', [
            'program' => [
                'id' => $program->id,
                'slug' => $program->slug,
                'title' => $program->title,
                'short_desc' => $program->short_desc,
                'image_url' => $program->getFirstMediaUrl('cover', 'webp')
                    ?: ($program->image_path ? asset($program->image_path) : asset('assets/program-sukan.jpg')),
                'lead' => $program->lead,
                'sections' => $program->sections ?? [],
                'cta' => $program->cta ?? [],
            ],
            'siblings' => $siblings,
            'settings' => [],
        ]);
    }
}
