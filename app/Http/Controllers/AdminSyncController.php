<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\GalleryItem;
use App\Models\Leader;
use App\Models\Member;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminSyncController extends Controller
{
    private const ALLOWED_KEYS = [
        'tbaCmsFrontpageData',
        'tbaSettings',
        'tbaAccountProfile',
        'tbaAdminMembers',
        'tbaAdminEvents',
        'tbaAdminArticles',
        'tbaAdminGallery',
        'tbaAdminLeaders',
    ];

    private const PUBLIC_KEYS = [
        'tbaCmsFrontpageData',
        'tbaSettings',
        'tbaAdminMembers',
        'tbaAdminEvents',
        'tbaAdminArticles',
        'tbaAdminGallery',
        'tbaAdminLeaders',
    ];

    public function index()
    {
        return response()->json($this->payload());
    }

    public function publicIndex()
    {
        return response()->json($this->publicPayload());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'in:'.implode(',', self::ALLOWED_KEYS)],
            'value' => ['nullable'],
        ]);

        SiteSetting::updateOrCreate(
            ['key' => $data['key']],
            ['value' => $data['value']],
        );

        return response()->json([
            'ok' => true,
            'data' => $this->payload(),
        ]);
    }

    public static function payload(): array
    {
        return self::payloadFor(self::ALLOWED_KEYS);
    }

    public static function publicPayload(): array
    {
        return self::payloadFor(self::PUBLIC_KEYS);
    }

    private static function payloadFor(array $keys): array
    {
        $items = [];

        if (Schema::hasTable('site_settings')) {
            $items = SiteSetting::query()
                ->whereIn('key', $keys)
                ->pluck('value', 'key')
                ->all();
        }

        return collect($keys)
            ->mapWithKeys(fn (string $key) => [$key => $items[$key] ?? self::fallbackFor($key)])
            ->all();
    }

    private static function fallbackFor(string $key): mixed
    {
        return match ($key) {
            'tbaAdminEvents' => self::eventsFallback(),
            'tbaAdminArticles' => self::articlesFallback(),
            'tbaAdminMembers' => self::membersFallback(),
            'tbaAdminGallery' => self::galleryFallback(),
            'tbaAdminLeaders' => self::leadersFallback(),
            default => null,
        };
    }

    private static function eventsFallback(): ?array
    {
        if (! Schema::hasTable('events')) {
            return null;
        }

        return Event::query()
            ->with('category')
            ->latest('starts_at')
            ->get()
            ->map(fn (Event $event) => [
                'id' => $event->id,
                'title' => $event->title,
                'category' => $event->category?->name ?? 'Komuniti',
                'status' => $event->status,
                'desc' => $event->description,
                'date' => $event->starts_at?->translatedFormat('d F Y') ?? '',
                'place' => $event->venue_name,
                'address' => $event->address,
                'image' => $event->banner_image ?: 'assets/event-1.jpg',
                'mapUrl' => $event->map_url,
            ])
            ->all();
    }

    private static function articlesFallback(): ?array
    {
        if (! Schema::hasTable('articles')) {
            return null;
        }

        return Article::query()
            ->latest('published_at')
            ->latest()
            ->get()
            ->map(fn (Article $article) => [
                'id' => $article->id,
                'title' => $article->title,
                'category' => $article->category ?: 'Artikel',
                'author' => $article->author,
                'status' => ucfirst($article->status),
                'date' => $article->published_at?->translatedFormat('d F Y') ?? $article->created_at?->translatedFormat('d F Y') ?? '',
                'image' => $article->thumbnail_path ?: 'assets/article-main.jpg',
                'body' => $article->content,
            ])
            ->all();
    }

    private static function membersFallback(): ?array
    {
        if (! Schema::hasTable('members')) {
            return null;
        }

        return Member::query()
            ->latest()
            ->get()
            ->map(fn (Member $member) => [
                'id' => $member->id,
                'name' => $member->full_name,
                'kp' => $member->identity_number,
                'presint' => $member->presint,
                'aid' => $member->aid_status,
                'date' => $member->created_at?->format('Y-m-d') ?? '',
                'status' => 'Disahkan',
                'photo' => $member->photo_path,
            ])
            ->all();
    }

    private static function galleryFallback(): ?array
    {
        if (! Schema::hasTable('gallery_items')) {
            return null;
        }

        return GalleryItem::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->latest()
            ->get()
            ->map(fn (GalleryItem $item) => [
                'id' => $item->id,
                'type' => $item->type,
                'title' => $item->title,
                'desc' => '',
                'image' => $item->image_path ?: 'assets/event-1.jpg',
                'url' => $item->external_url,
            ])
            ->all();
    }

    private static function leadersFallback(): ?array
    {
        if (! Schema::hasTable('leaders')) {
            return null;
        }

        return Leader::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Leader $leader) => [
                'id' => $leader->id,
                'name' => $leader->full_name,
                'jawatan' => $leader->position,
                'image' => $leader->photo_path ?: 'assets/leader-1.jpg',
                'bio' => $leader->bio,
                'focus' => $leader->extra_info,
                'stats' => [],
            ])
            ->all();
    }
}
