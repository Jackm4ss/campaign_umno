<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Static catalog for homepage upcoming-events marquee and /acara/{slug} pages.
 */
final class CampaignEvents
{
    /**
     * @return list<array{
     *     slug: string,
     *     title: string,
     *     dateLabel: string,
     *     place: string,
     *     shortDesc: string,
     *     image: string,
     *     lead: string,
     *     sections: list<array{heading: string, paragraphs?: list<string>, bullets?: list<string>}>,
     *     cta: array{primary: array{label: string, href: string}, secondary: array{label: string, href: string}}
     * }>
     */
    public static function all(): array
    {
        return [
            [
                'slug' => 'gotong-royong-komuniti',
                'title' => 'Gotong Royong Komuniti Putrajaya',
                'dateLabel' => '16 Ogos 2026',
                'place' => 'Presint 9, Putrajaya',
                'shortDesc' => 'Kerja bakti bersama jentera setempat untuk kawasan yang lebih bersih dan mesra.',
                'image' => 'assets/umno-gotong-royong-putraharmoni.jpg',
                'lead' => 'Acara gotong-royong ini merapatkan warga, sukarelawan dan jentera kempen untuk merawat ruang komuniti — bukan sekadar bergambar, tetapi kerja nyata di lapangan.',
                'sections' => [
                    [
                        'heading' => 'Apa yang akan berlangsung',
                        'paragraphs' => [
                            'Pasukan akan bergerak mengikut zon yang ditetapkan. Fokus kepada kebersihan kawasan awam, penyelenggaraan ringan, dan semangat gotong-royong yang merapatkan jiran.',
                        ],
                        'bullets' => [
                            'Taklimat ringkas keselamatan dan pembahagian tugasan.',
                            'Kerja bakti di kawasan awam dan ruang komuniti terpilih.',
                            'Sesi penutup serta rakaman kehadiran untuk rekod gerakan.',
                        ],
                    ],
                    [
                        'heading' => 'Siapa digalakkan hadir',
                        'paragraphs' => [
                            'Terbuka kepada warga Putrajaya, belia, ahli keluarga dan sukarelawan yang mahu menyumbang tenaga. Bawa semangat kerjasama — peralatan asas akan dikoordinasikan oleh jentera setempat.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
            [
                'slug' => 'ziarah-prihatin',
                'title' => 'Ziarah Prihatin Warga',
                'dateLabel' => '23 Ogos 2026',
                'place' => 'Pelbagai presint, Putrajaya',
                'shortDesc' => 'Lawatan keprihatinan kepada warga yang memerlukan sokongan segera.',
                'image' => 'assets/umno-ziarah-prihatin-2025.jpg',
                'lead' => 'Ziarah prihatin menekankan kehadiran — mendengar, memahami, dan memastikan saluran bantuan sampai kepada yang benar-benar memerlukan.',
                'sections' => [
                    [
                        'heading' => 'Matlamat ziarah',
                        'paragraphs' => [
                            'Setiap lawatan merekod keperluan sebenar di lapangan supaya tindakan susulan lebih tepat. Data dikendalikan dengan hormat dan teratur.',
                        ],
                        'bullets' => [
                            'Lawatan ke isi rumah yang dikenal pasti jentera setempat.',
                            'Semakan keperluan asas dan sokongan sosial.',
                            'Rujukan ke saluran borang bantuan apabila relevan.',
                        ],
                    ],
                    [
                        'heading' => 'Saluran bantuan',
                        'paragraphs' => [
                            'Jika anda atau jiran memerlukan sokongan, lengkapkan borang bantuan di laman rasmi. Permohonan diproses dalam tempoh lima (5) hari bekerja.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
            [
                'slug' => 'program-khidmat-rakyat',
                'title' => 'Program Khidmat Rakyat',
                'dateLabel' => '30 Ogos 2026',
                'place' => 'Dewan Komuniti Putrajaya',
                'shortDesc' => 'Hari khidmat terbuka: penerangan, runding cara, dan kehadiran bersama warga.',
                'image' => 'assets/adnan-khidmat-2024.jpg',
                'lead' => 'Program khidmat rakyat memberi ruang warga bertemu jentera, bertanya soalan, dan membawa isu setempat ke meja tindakan.',
                'sections' => [
                    [
                        'heading' => 'Agenda ringkas',
                        'bullets' => [
                            'Pendaftaran dan taklimat pembukaan.',
                            'Kaunter penerangan program kempen dan inisiatif komuniti.',
                            'Sesi dengar aspirasi serta rekod isu lapangan.',
                        ],
                    ],
                    [
                        'heading' => 'Apa yang perlu dibawa',
                        'paragraphs' => [
                            'Bawa dokumen asas jika ingin merujuk isu khusus (contoh: salinan MyKad untuk rekod runding). Kehadiran keluarga digalakkan.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
            [
                'slug' => 'pek-makanan-komuniti',
                'title' => 'Pek Makanan & Bantuan Asas',
                'dateLabel' => '6 September 2026',
                'place' => 'Pusat Pengumpulan Putrajaya',
                'shortDesc' => 'Penyediaan dan agihan pek makanan kepada warga yang memerlukan.',
                'image' => 'assets/tba-pek-makanan-ramadan-2025.jpg',
                'lead' => 'Inisiatif pek makanan memastikan bantuan asas sampai dengan cara teratur — dari penyusunan, penjadualan, hingga agihan di lapangan.',
                'sections' => [
                    [
                        'heading' => 'Fokus acara',
                        'bullets' => [
                            'Penyusunan dan pemeriksaan pek makanan.',
                            'Koordinasi agihan bersama sukarelawan setempat.',
                            'Rekod penerima untuk susulan kebajikan yang lebih tepat.',
                        ],
                    ],
                    [
                        'heading' => 'Sukarelawan dan penerima',
                        'paragraphs' => [
                            'Sukarelawan boleh tawarkan tenaga melalui aspirasi atau jentera setempat. Warga yang memerlukan digalakkan gunakan borang bantuan rasmi.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
            [
                'slug' => 'sukan-komuniti',
                'title' => 'Sukan & Gaya Hidup Komuniti',
                'dateLabel' => '13 September 2026',
                'place' => 'Padang Komuniti Putrajaya',
                'shortDesc' => 'Hari sukan rekreasi untuk segenap lapisan umur.',
                'image' => 'assets/event-1.jpg',
                'lead' => 'Acara sukan komuniti menggalakkan gaya hidup aktif, merapatkan keluarga, dan membuka ruang belia serta warga emas bergerak bersama.',
                'sections' => [
                    [
                        'heading' => 'Aktiviti dirancang',
                        'bullets' => [
                            'Rekreasi ringan dan permainan berpasukan.',
                            'Pendedahan gaya hidup sihat secara ringkas.',
                            'Suasana inklusif — datang sebagai peserta atau penyokong.',
                        ],
                    ],
                    [
                        'heading' => 'Penyertaan',
                        'paragraphs' => [
                            'Pakaian sukan selesa digalakkan. Maklumkan keperluan khas (contoh: akses roda) awal supaya tapak lebih mesra.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
            [
                'slug' => 'dialog-aspirasi-warga',
                'title' => 'Dialog Aspirasi Warga',
                'dateLabel' => '20 September 2026',
                'place' => 'Dewan Serbaguna Putrajaya',
                'shortDesc' => 'Sesi dengar suara warga untuk hala tuju program setempat.',
                'image' => 'assets/aspirasi-warga-putrajaya-1.jpg',
                'lead' => 'Dialog ini memberi ruang formal untuk warga menyuarakan keperluan, cadangan dan kebimbangan — supaya program kempen berasaskan realiti lapangan.',
                'sections' => [
                    [
                        'heading' => 'Format sesi',
                        'bullets' => [
                            'Pembukaan dan kerangka dialog.',
                            'Slot aspirasi warga mengikut giliran.',
                            'Ringkasan isu dan saluran susulan (termasuk borang dalam talian).',
                        ],
                    ],
                    [
                        'heading' => 'Selepas dialog',
                        'paragraphs' => [
                            'Isu yang diangkat akan disaring untuk tindakan dan dimaklumkan melalui saluran kempen. Anda juga boleh hantar aspirasi bilamana-bila melalui laman ini.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list'],
                ],
            ],
        ];
    }

    /**
     * @return list<string>
     */
    public static function slugs(): array
    {
        return array_values(array_map(
            static fn (array $event): string => $event['slug'],
            self::all(),
        ));
    }

    /**
     * @return array{
     *     slug: string,
     *     title: string,
     *     dateLabel: string,
     *     place: string,
     *     shortDesc: string,
     *     image: string,
     *     lead: string,
     *     sections: list<array{heading: string, paragraphs?: list<string>, bullets?: list<string>}>,
     *     cta: array{primary: array{label: string, href: string}, secondary: array{label: string, href: string}}
     * }|null
     */
    public static function find(string $slug): ?array
    {
        foreach (self::all() as $event) {
            if ($event['slug'] === $slug) {
                return $event;
            }
        }

        return null;
    }

    /**
     * @return list<array{slug: string, title: string}>
     */
    public static function siblings(string $currentSlug): array
    {
        return array_values(array_map(
            static fn (array $event): array => [
                'slug' => $event['slug'],
                'title' => $event['title'],
            ],
            array_filter(
                self::all(),
                static fn (array $event): bool => $event['slug'] !== $currentSlug,
            ),
        ));
    }
}
