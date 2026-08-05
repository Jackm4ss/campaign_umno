<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\CampaignPrograms;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class PublicProgramController extends Controller
{
    public function show(Request $request, string $slug): View
    {
        $program = CampaignPrograms::find($slug);

        abort_if($program === null, 404);

        return view('public.program-show', [
            'program' => $program,
            'siblings' => CampaignPrograms::siblings($slug),
            'settings' => [],
        ]);
    }
}
