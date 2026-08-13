<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Support\RichArticleContent;
use PHPUnit\Framework\TestCase;

final class RichArticleContentTest extends TestCase
{
    public function test_seeded_content_is_combined_into_one_editor_article(): void
    {
        $html = RichArticleContent::fromLegacySections('Pengenalan program.', [
            [
                'heading' => 'Apa yang kami gerakkan',
                'paragraphs' => ['Perenggan pertama.', 'Perenggan kedua.'],
                'bullets' => ['Poin pertama.', 'Poin kedua.'],
            ],
        ]);

        $this->assertSame(
            '<p>Pengenalan program.</p>'
            .'<h2>Apa yang kami gerakkan</h2>'
            .'<p>Perenggan pertama.</p>'
            .'<p>Perenggan kedua.</p>'
            .'<ul><li>Poin pertama.</li><li>Poin kedua.</li></ul>',
            $html,
        );
    }

    public function test_existing_editor_html_is_preserved_and_legacy_text_is_escaped(): void
    {
        $html = RichArticleContent::fromLegacySections('<p><strong>Pengenalan sedia ada.</strong></p>', [
            [
                'heading' => 'A & B',
                'paragraphs' => ['Nilai <selamat>.'],
                'bullets' => [],
            ],
        ]);

        $this->assertSame(
            '<p><strong>Pengenalan sedia ada.</strong></p>'
            .'<h2>A &amp; B</h2>'
            .'<p>Nilai &lt;selamat&gt;.</p>',
            $html,
        );
    }
}
