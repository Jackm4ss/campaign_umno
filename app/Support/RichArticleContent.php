<?php

declare(strict_types=1);

namespace App\Support;

final class RichArticleContent
{
    /**
     * Convert legacy structured blocks into the single RichEditor article used by admins.
     *
     * @param  array<int, array<string, mixed>>|null  $sections
     */
    public static function fromLegacySections(string $lead, ?array $sections): string
    {
        $html = self::normalizeLead($lead);

        foreach ($sections ?? [] as $section) {
            $heading = trim((string) ($section['heading'] ?? ''));
            $paragraphs = self::cleanLines($section['paragraphs'] ?? []);
            $bullets = self::cleanLines($section['bullets'] ?? []);

            if ($heading !== '') {
                $html .= '<h2>'.self::escape($heading).'</h2>';
            }

            foreach ($paragraphs as $paragraph) {
                $html .= '<p>'.self::escape($paragraph).'</p>';
            }

            if ($bullets !== []) {
                $html .= '<ul>';

                foreach ($bullets as $bullet) {
                    $html .= '<li>'.self::escape($bullet).'</li>';
                }

                $html .= '</ul>';
            }
        }

        return $html;
    }

    /**
     * @param  array<int, mixed>  $lines
     * @return array<int, string>
     */
    private static function cleanLines(array $lines): array
    {
        return collect($lines)
            ->map(fn (mixed $line): string => trim((string) $line))
            ->filter(fn (string $line): bool => $line !== '')
            ->values()
            ->all();
    }

    private static function normalizeLead(string $lead): string
    {
        $lead = trim($lead);

        if ($lead === '') {
            return '';
        }

        if ($lead !== strip_tags($lead)) {
            return $lead;
        }

        return '<p>'.self::escape($lead).'</p>';
    }

    private static function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
