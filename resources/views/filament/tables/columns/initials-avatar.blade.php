@php
    $name = trim((string) $getState());
    $words = preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $initials = strtoupper(implode('', array_map(fn (string $word) => mb_substr($word, 0, 1), array_slice($words, 0, 2))));
    $palette = ['#CC1A1A', '#1A3C9E', '#0f766e', '#b45309', '#7e22ce', '#0e7490'];
    $color = $palette[abs(crc32($name)) % count($palette)];
@endphp

<div class="flex items-center gap-x-3">
    <span
        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-xs font-bold text-white"
        style="background-color: {{ $color }}"
        aria-hidden="true"
    >{{ $initials !== '' ? $initials : '?' }}</span>
    <span class="font-medium text-gray-950 dark:text-white">{{ $name }}</span>
</div>
