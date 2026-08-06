<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignEventContentSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'slug' => 'gotong-royong-komuniti',
                'title' => 'Gotong Royong Komuniti Putrajaya',
                'date_label' => '16 Ogos 2026',
                'place' => 'Presint 9, Putrajaya',
                'short_desc' => 'Kerja bakti bersama jentera setempat untuk kawasan yang lebih bersih dan mesra.',
                'image_path' => 'assets/umno-gotong-royong-putraharmoni.jpg',
                'lead' => 'Acara gotong-royong ini merapatkan warga, sukarelawan dan jentera kempen untuk merawat ruang komuniti — bukan sekadar bergambar, tetapi kerja nyata di lapangan.',
                'sections' => json_encode([
                    ['heading' => 'Apa yang akan berlangsung', 'paragraphs' => ['Pasukan akan bergerak mengikut zon yang ditetapkan. Fokus kepada kebersihan kawasan awam, penyelenggaraan ringan, dan semangat gotong-royong yang merapatkan jiran.'], 'bullets' => ['Taklimat ringkas keselamatan dan pembahagian tugasan.', 'Kerja bakti di kawasan awam dan ruang komuniti terpilih.', 'Sesi penutup serta rakaman kehadiran untuk rekod gerakan.']],
                    ['heading' => 'Siapa digalakkan hadir', 'paragraphs' => ['Terbuka kepada warga Putrajaya, belia, ahli keluarga dan sukarelawan yang mahu menyumbang tenaga. Bawa semangat kerjasama — peralatan asas akan dikoordinasikan oleh jentera setempat.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 1,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'ziarah-prihatin',
                'title' => 'Ziarah Prihatin Warga',
                'date_label' => '23 Ogos 2026',
                'place' => 'Pelbagai presint, Putrajaya',
                'short_desc' => 'Lawatan keprihatinan kepada warga yang memerlukan sokongan segera.',
                'image_path' => 'assets/umno-ziarah-prihatin-2025.jpg',
                'lead' => 'Ziarah prihatin menekankan kehadiran — mendengar, memahami, dan memastikan saluran bantuan sampai kepada yang benar-benar memerlukan.',
                'sections' => json_encode([
                    ['heading' => 'Matlamat ziarah', 'paragraphs' => ['Setiap lawatan merekod keperluan sebenar di lapangan supaya tindakan susulan lebih tepat. Data dikendalikan dengan hormat dan teratur.'], 'bullets' => ['Lawatan ke isi rumah yang dikenal pasti jentera setempat.', 'Semakan keperluan asas dan sokongan sosial.', 'Rujukan ke saluran borang bantuan apabila relevan.']],
                    ['heading' => 'Saluran bantuan', 'paragraphs' => ['Jika anda atau jiran memerlukan sokongan, lengkapkan borang bantuan di laman rasmi. Permohonan diproses dalam tempoh lima (5) hari bekerja.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 2,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'program-khidmat-rakyat',
                'title' => 'Program Khidmat Rakyat',
                'date_label' => '30 Ogos 2026',
                'place' => 'Dewan Komuniti Putrajaya',
                'short_desc' => 'Hari khidmat terbuka: penerangan, runding cara, dan kehadiran bersama warga.',
                'image_path' => 'assets/adnan-khidmat-2024.jpg',
                'lead' => 'Program khidmat rakyat memberi ruang warga bertemu jentera, bertanya soalan, dan membawa isu setempat ke meja tindakan.',
                'sections' => json_encode([
                    ['heading' => 'Agenda ringkas', 'bullets' => ['Pendaftaran dan taklimat pembukaan.', 'Kaunter penerangan program kempen dan inisiatif komuniti.', 'Sesi dengar aspirasi serta rekod isu lapangan.']],
                    ['heading' => 'Apa yang perlu dibawa', 'paragraphs' => ['Bawa dokumen asas jika ingin merujuk isu khusus (contoh: salinan MyKad untuk rekod runding). Kehadiran keluarga digalakkan.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 3,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'pek-makanan-komuniti',
                'title' => 'Pek Makanan & Bantuan Asas',
                'date_label' => '6 September 2026',
                'place' => 'Pusat Pengumpulan Putrajaya',
                'short_desc' => 'Penyediaan dan agihan pek makanan kepada warga yang memerlukan.',
                'image_path' => 'assets/tba-pek-makanan-ramadan-2025.jpg',
                'lead' => 'Inisiatif pek makanan memastikan bantuan asas sampai dengan cara teratur — dari penyusunan, penjadualan, hingga agihan di lapangan.',
                'sections' => json_encode([
                    ['heading' => 'Fokus acara', 'bullets' => ['Penyusunan dan pemeriksaan pek makanan.', 'Koordinasi agihan bersama sukarelawan setempat.', 'Rekod penerima untuk susulan kebajikan yang lebih tepat.']],
                    ['heading' => 'Sukarelawan dan penerima', 'paragraphs' => ['Sukarelawan boleh tawarkan tenaga melalui aspirasi atau jentera setempat. Warga yang memerlukan digalakkan gunakan borang bantuan rasmi.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 4,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'sukan-komuniti',
                'title' => 'Sukan & Gaya Hidup Komuniti',
                'date_label' => '13 September 2026',
                'place' => 'Padang Komuniti Putrajaya',
                'short_desc' => 'Hari sukan rekreasi untuk segenap lapisan umur.',
                'image_path' => 'assets/event-1.jpg',
                'lead' => 'Acara sukan komuniti menggalakkan gaya hidup aktif, merapatkan keluarga, dan membuka ruang belia serta warga emas bergerak bersama.',
                'sections' => json_encode([
                    ['heading' => 'Aktiviti dirancang', 'bullets' => ['Rekreasi ringan dan permainan berpasukan.', 'Pendedahan gaya hidup sihat secara ringkas.', 'Suasana inklusif — datang sebagai peserta atau penyokong.']],
                    ['heading' => 'Penyertaan', 'paragraphs' => ['Pakaian sukan selesa digalakkan. Maklumkan keperluan khas (contoh: akses roda) awal supaya tapak lebih mesra.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 5,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'dialog-aspirasi-warga',
                'title' => 'Dialog Aspirasi Warga',
                'date_label' => '20 September 2026',
                'place' => 'Dewan Serbaguna Putrajaya',
                'short_desc' => 'Sesi dengar suara warga untuk hala tuju program setempat.',
                'image_path' => 'assets/aspirasi-warga-putrajaya-1.jpg',
                'lead' => 'Dialog ini memberi ruang formal untuk warga menyuarakan keperluan, cadangan dan kebimbangan — supaya program kempen berasaskan realiti lapangan.',
                'sections' => json_encode([
                    ['heading' => 'Format sesi', 'bullets' => ['Pembukaan dan kerangka dialog.', 'Slot aspirasi warga mengikut giliran.', 'Ringkasan isu dan saluran susulan (termasuk borang dalam talian).']],
                    ['heading' => 'Selepas dialog', 'paragraphs' => ['Isu yang diangkat akan disaring untuk tindakan dan dimaklumkan melalui saluran kempen. Anda juga boleh hantar aspirasi bilamana-bila melalui laman ini.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua acara', 'href' => 'acara-list']]),
                'sort_order' => 6,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('campaign_event_contents')->insert($events);
    }
}
