<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Static catalog for homepage program cards and /program/{slug} detail pages.
 */
final class CampaignPrograms
{
    /**
     * @return list<array{
     *     slug: string,
     *     title: string,
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
                'slug' => 'sukan-gaya-hidup',
                'title' => 'Sukan & Gaya Hidup',
                'shortDesc' => 'Aktiviti sukan dan gaya hidup sihat untuk semua peringkat umur.',
                'image' => 'assets/program-sukan.jpg',
                'lead' => 'Program ini menggerakkan budaya hidup aktif dalam kalangan warga Putrajaya — merentasi umur, minat dan kemampuan — supaya kesihatan fizikal dan kesejahteraan harian menjadi sebahagian daripada nadi komuniti.',
                'sections' => [
                    [
                        'heading' => 'Apa yang kami gerakkan',
                        'paragraphs' => [
                            'Sukan dan rekreasi bukan sekadar pertandingan. Ia ruang bertemu jiran, membina disiplin, dan memberi belia serta keluarga peluang bergerak bersama dalam persekitaran yang selamat dan inklusif.',
                        ],
                        'bullets' => [
                            'Aktiviti sukan komuniti dan rekreasi setempat untuk pelbagai peringkat umur.',
                            'Pendedahan gaya hidup sihat, kesedaran kesihatan dan amalan harian yang mampan.',
                            'Ruang inklusif untuk keluarga, belia dan warga emas menyertai tanpa halangan yang tidak perlu.',
                            'Kerjasama dengan kelab, unit setempat dan jentera lapangan untuk program yang berterusan.',
                        ],
                    ],
                    [
                        'heading' => 'Cara anda boleh terlibat',
                        'paragraphs' => [
                            'Cadangkan aktiviti, nyatakan keperluan fasiliti di kawasan anda, atau tawarkan diri sebagai sukarelawan program. Suara warga menentukan prioriti gerak kerja di lapangan.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
                ],
            ],
            [
                'slug' => 'kebajikan-sosial',
                'title' => 'Kebajikan & Sosial',
                'shortDesc' => 'Bantuan kebajikan dan program sosial untuk warga yang memerlukan.',
                'image' => 'assets/program-kebajikan.jpg',
                'lead' => 'Tumpuan program ini ialah warga yang memerlukan sokongan segera dan berterusan — supaya bantuan sampai dengan cara yang hormat, teratur dan boleh diikuti.',
                'sections' => [
                    [
                        'heading' => 'Fokus kebajikan',
                        'paragraphs' => [
                            'Kami menekankan saluran yang jelas: dari permohonan hinggalah maklum balas. Tiada warga sepatutnya rasa terabai hanya kerana tidak tahu ke mana hendak merujuk.',
                        ],
                        'bullets' => [
                            'Bantuan asas dan program sosial untuk isi rumah yang terjejas.',
                            'Ziarah prihatin dan kehadiran lapangan bersama jentera setempat.',
                            'Saluran borang bantuan rasmi untuk rekod dan tindakan pentadbir.',
                            'Proses yang telus: permohonan diproses dalam tempoh lima (5) hari bekerja, dan admin akan berhubung semula melalui e-mel atau Whatsapp jika diluluskan.',
                        ],
                    ],
                    [
                        'heading' => 'Mohon bantuan',
                        'paragraphs' => [
                            'Lengkapkan borang bantuan dengan maklumat yang tepat. Semakin lengkap data anda, semakin mudah pasukan kami menyemak dan mengambil tindakan lanjut.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
                ],
            ],
            [
                'slug' => 'pendidikan-kemahiran',
                'title' => 'Pendidikan & Kemahiran',
                'shortDesc' => 'Peluang pendidikan dan latihan kemahiran untuk masa depan.',
                'image' => 'assets/program-pendidikan.jpg',
                'lead' => 'Program ini membuka peluang belajar dan menambah kemahiran untuk belia, ibu bapa dan pencari rezeki di Putrajaya — supaya masa depan tidak bergantung pada nasib semata-mata.',
                'sections' => [
                    [
                        'heading' => 'Pembelajaran yang relevan',
                        'paragraphs' => [
                            'Fokus kami bukan teori semata-mata, tetapi pendedahan praktikal yang boleh dipakai di rumah, di tempat kerja dan dalam komuniti.',
                        ],
                        'bullets' => [
                            'Pendedahan pendidikan dan motivasi belia ke arah laluan yang lebih jelas.',
                            'Bengkel kemahiran praktikal — termasuk asas digital dan kerjaya ringkas.',
                            'Bimbingan yang mudah difahami untuk ibu bapa dan keluarga.',
                            'Kerjasama dengan institusi serta rakan setempat untuk program yang berterusan.',
                        ],
                    ],
                    [
                        'heading' => 'Suarakan keperluan anda',
                        'paragraphs' => [
                            'Beritahu kami jenis bengkel, topik atau sokongan pendidikan yang paling diperlukan di kawasan anda. Aspirasi warga menjadi asas penyusunan program.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
                ],
            ],
            [
                'slug' => 'komuniti-sukarelawan',
                'title' => 'Komuniti & Sukarelawan',
                'shortDesc' => 'Jaringan sukarelawan dan aktiviti komuniti yang bermakna.',
                'image' => 'assets/program-komuniti.jpg',
                'lead' => 'Jaringan sukarelawan ialah tulang belakang gerak kerja lapangan. Program ini merapatkan warga, unit setempat dan jentera kempen supaya kerja bakti berjalan teratur dan memberi manfaat nyata.',
                'sections' => [
                    [
                        'heading' => 'Gerak kerja bersama',
                        'paragraphs' => [
                            'Dari gotong-royong hingga program komuniti, kami percaya kehadiran di lapangan lebih bermakna apabila ada koordinasi, adab dan matlamat yang jelas.',
                        ],
                        'bullets' => [
                            'Gotong-royong, kerja bakti dan program kebersihan serta pemuliharaan ruang komuniti.',
                            'Koordinasi unit setempat supaya tenaga sukarelawan tidak bertaburan.',
                            'Peluang sukarelawan merentas program kempen — sukan, kebajikan, pendidikan dan lainnya.',
                            'Budaya dengar–tindak: isu diangkat, diulas, lalu digarap menjadi tindakan.',
                        ],
                    ],
                    [
                        'heading' => 'Sertai sebagai sukarelawan',
                        'paragraphs' => [
                            'Jika anda mahu menyumbang masa dan tenaga, hantar aspirasi atau hubungi jentera setempat. Setiap tangan yang membantu memperkukuh gerakan Tak Banyak Alasan.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Sertai Gerakan', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
                ],
            ],
            [
                'slug' => 'kerohanian',
                'title' => 'Kerohanian',
                'shortDesc' => 'Program kerohanian dan keagamaan untuk kesejahteraan ummah.',
                'image' => 'assets/program-rohani.jpg',
                'lead' => 'Program kerohanian merapatkan komuniti melalui nilai, adab dan kerjasama institusi setempat — demi kesejahteraan ummah yang seimbang antara dunia dan akhirat.',
                'sections' => [
                    [
                        'heading' => 'Nilai yang merapatkan',
                        'paragraphs' => [
                            'Kerohanian dalam konteks kempen ini bukan acara semata-mata. Ia soal membina perpaduan, menghormati kepelbagaian dalam kerangka adab, dan menguatkan institusi setempat yang sudah wujud di tengah masyarakat.',
                        ],
                        'bullets' => [
                            'Program keagamaan dan pengukuhan nilai dalam kalangan keluarga serta belia.',
                            'Kerjasama dengan surau, masjid dan institusi setempat.',
                            'Penekanan adab, perpaduan dan kepekaan sosial dalam gerak kerja lapangan.',
                            'Sokongan kepada keluarga supaya kesejahteraan rohani dan fizikal seiring.',
                        ],
                    ],
                    [
                        'heading' => 'Cadangkan program',
                        'paragraphs' => [
                            'Ada idea kuliah, program keluarga atau inisiatif kerohanian di kawasan anda? Sampaikan melalui aspirasi supaya ia dapat dinilai dan disusun bersama jentera setempat.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
                ],
            ],
            [
                'slug' => 'ekonomi-keusahawanan',
                'title' => 'Ekonomi & Keusahawanan',
                'shortDesc' => 'Sokongan keusahawanan dan peluang ekonomi untuk warga.',
                'image' => 'assets/program-ekonomi.jpg',
                'lead' => 'Program ini memberi tumpuan kepada ekonomi akar umbi dan usahawan kecil di Putrajaya — supaya rezeki tempatan tumbuh dengan jaringan, kemahiran dan keyakinan yang lebih kukuh.',
                'sections' => [
                    [
                        'heading' => 'Sokongan usahawan komuniti',
                        'paragraphs' => [
                            'Kami percaya pertumbuhan ekonomi tempatan bermula daripada usahawan yang dikenali jiran, dilatih dengan asas yang betul, dan dihubungkan kepada peluang yang relevan.',
                        ],
                        'bullets' => [
                            'Pendedahan keusahawanan dan mindset perniagaan untuk warga serta belia.',
                            'Jaringan usahawan komuniti untuk berkongsi pengalaman dan peluang.',
                            'Kemahiran asas jualan, promosi dan digital yang praktikal.',
                            'Pautan ke program kemahiran dan saluran bantuan apabila relevan kepada keperluan isi rumah.',
                        ],
                    ],
                    [
                        'heading' => 'Bina bersama',
                        'paragraphs' => [
                            'Ceritakan cabaran perniagaan mikro anda, idea gerai komuniti, atau keperluan latihan. Aspirasi ini membantu kami menyusun program yang benar-benar menyentuh lapangan.',
                        ],
                    ],
                ],
                'cta' => [
                    'primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'],
                    'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list'],
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
            static fn (array $program): string => $program['slug'],
            self::all(),
        ));
    }

    /**
     * @return array{
     *     slug: string,
     *     title: string,
     *     shortDesc: string,
     *     image: string,
     *     lead: string,
     *     sections: list<array{heading: string, paragraphs?: list<string>, bullets?: list<string>}>,
     *     cta: array{primary: array{label: string, href: string}, secondary: array{label: string, href: string}}
     * }|null
     */
    public static function find(string $slug): ?array
    {
        foreach (self::all() as $program) {
            if ($program['slug'] === $slug) {
                return $program;
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
            static fn (array $program): array => [
                'slug' => $program['slug'],
                'title' => $program['title'],
            ],
            array_filter(
                self::all(),
                static fn (array $program): bool => $program['slug'] !== $currentSlug,
            ),
        ));
    }
}
