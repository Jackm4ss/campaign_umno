<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'slug' => 'sukan-gaya-hidup',
                'title' => 'Sukan & Gaya Hidup',
                'short_desc' => 'Aktiviti sukan dan gaya hidup sihat untuk semua peringkat umur.',
                'image_path' => 'assets/program-sukan.jpg',
                'lead' => 'Program ini menggerakkan budaya hidup aktif dalam kalangan warga Putrajaya — merentasi umur, minat dan kemampuan — supaya kesihatan fizikal dan kesejahteraan harian menjadi sebahagian daripada nadi komuniti.',
                'sections' => json_encode([
                    ['heading' => 'Apa yang kami gerakkan', 'paragraphs' => ['Sukan dan rekreasi bukan sekadar pertandingan. Ia ruang bertemu jiran, membina disiplin, dan memberi belia serta keluarga peluang bergerak bersama dalam persekitaran yang selamat dan inklusif.'], 'bullets' => ['Aktiviti sukan komuniti dan rekreasi setempat untuk pelbagai peringkat umur.', 'Pendedahan gaya hidup sihat, kesedaran kesihatan dan amalan harian yang mampan.', 'Ruang inklusif untuk keluarga, belia dan warga emas menyertai tanpa halangan yang tidak perlu.', 'Kerjasama dengan kelab, unit setempat dan jentera lapangan untuk program yang berterusan.']],
                    ['heading' => 'Cara anda boleh terlibat', 'paragraphs' => ['Cadangkan aktiviti, nyatakan keperluan fasiliti di kawasan anda, atau tawarkan diri sebagai sukarelawan program. Suara warga menentukan prioriti gerak kerja di lapangan.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 1,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'kebajikan-sosial',
                'title' => 'Kebajikan & Sosial',
                'short_desc' => 'Bantuan kebajikan dan program sosial untuk warga yang memerlukan.',
                'image_path' => 'assets/program-kebajikan.jpg',
                'lead' => 'Tumpuan program ini ialah warga yang memerlukan sokongan segera dan berterusan — supaya bantuan sampai dengan cara yang hormat, teratur dan boleh diikuti.',
                'sections' => json_encode([
                    ['heading' => 'Fokus kebajikan', 'paragraphs' => ['Kami menekankan saluran yang jelas: dari permohonan hinggalah maklum balas. Tiada warga sepatutnya rasa terabai hanya kerana tidak tahu ke mana hendak merujuk.'], 'bullets' => ['Bantuan asas dan program sosial untuk isi rumah yang terjejas.', 'Ziarah prihatin dan kehadiran lapangan bersama jentera setempat.', 'Saluran borang bantuan rasmi untuk rekod dan tindakan pentadbir.', 'Proses yang telus: permohonan diproses dalam tempoh lima (5) hari bekerja, dan admin akan berhubung semula melalui e-mel atau Whatsapp jika diluluskan.']],
                    ['heading' => 'Mohon bantuan', 'paragraphs' => ['Lengkapkan borang bantuan dengan maklumat yang tepat. Semakin lengkap data anda, semakin mudah pasukan kami menyemak dan mengambil tindakan lanjut.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Borang Bantuan', 'href' => 'bantuan'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 2,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'pendidikan-kemahiran',
                'title' => 'Pendidikan & Kemahiran',
                'short_desc' => 'Peluang pendidikan dan latihan kemahiran untuk masa depan.',
                'image_path' => 'assets/program-pendidikan.jpg',
                'lead' => 'Program ini membuka peluang belajar dan menambah kemahiran untuk belia, ibu bapa dan pencari rezeki di Putrajaya — supaya masa depan tidak bergantung pada nasib semata-mata.',
                'sections' => json_encode([
                    ['heading' => 'Pembelajaran yang relevan', 'paragraphs' => ['Fokus kami bukan teori semata-mata, tetapi pendedahan praktikal yang boleh dipakai di rumah, di tempat kerja dan dalam komuniti.'], 'bullets' => ['Pendedahan pendidikan dan motivasi belia ke arah laluan yang lebih jelas.', 'Bengkel kemahiran praktikal — termasuk asas digital dan kerjaya ringkas.', 'Bimbingan yang mudah difahami untuk ibu bapa dan keluarga.', 'Kerjasama dengan institusi serta rakan setempat untuk program yang berterusan.']],
                    ['heading' => 'Suarakan keperluan anda', 'paragraphs' => ['Beritahu kami jenis bengkel, topik atau sokongan pendidikan yang paling diperlukan di kawasan anda. Aspirasi warga menjadi asas penyusunan program.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 3,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'komuniti-sukarelawan',
                'title' => 'Komuniti & Sukarelawan',
                'short_desc' => 'Jaringan sukarelawan dan aktiviti komuniti yang bermakna.',
                'image_path' => 'assets/program-komuniti.jpg',
                'lead' => 'Jaringan sukarelawan ialah tulang belakang gerak kerja lapangan. Program ini merapatkan warga, unit setempat dan jentera kempen supaya kerja bakti berjalan teratur dan memberi manfaat nyata.',
                'sections' => json_encode([
                    ['heading' => 'Gerak kerja bersama', 'paragraphs' => ['Dari gotong-royong hingga program komuniti, kami percaya kehadiran di lapangan lebih bermakna apabila ada koordinasi, adab dan matlamat yang jelas.'], 'bullets' => ['Gotong-royong, kerja bakti dan program kebersihan serta pemuliharaan ruang komuniti.', 'Koordinasi unit setempat supaya tenaga sukarelawan tidak bertaburan.', 'Peluang sukarelawan merentas program kempen — sukan, kebajikan, pendidikan dan lainnya.', 'Budaya dengar–tindak: isu diangkat, diulas, lalu digarap menjadi tindakan.']],
                    ['heading' => 'Sertai sebagai sukarelawan', 'paragraphs' => ['Jika anda mahu menyumbang masa dan tenaga, hantar aspirasi atau hubungi jentera setempat. Setiap tangan yang membantu memperkukuh gerakan Tak Banyak Alasan.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Sertai Gerakan', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 4,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'kerohanian',
                'title' => 'Kerohanian',
                'short_desc' => 'Program kerohanian dan keagamaan untuk kesejahteraan ummah.',
                'image_path' => 'assets/program-rohani.jpg',
                'lead' => 'Program kerohanian merapatkan komuniti melalui nilai, adab dan kerjasama institusi setempat — demi kesejahteraan ummah yang seimbang antara dunia dan akhirat.',
                'sections' => json_encode([
                    ['heading' => 'Nilai yang merapatkan', 'paragraphs' => ['Kerohanian dalam konteks kempen ini bukan acara semata-mata. Ia soal membina perpaduan, menghormati kepelbagaian dalam kerangka adab, dan menguatkan institusi setempat yang sudah wujud di tengah masyarakat.'], 'bullets' => ['Program keagamaan dan pengukuhan nilai dalam kalangan keluarga serta belia.', 'Kerjasama dengan surau, masjid dan institusi setempat.', 'Penekanan adab, perpaduan dan kepekaan sosial dalam gerak kerja lapangan.', 'Sokongan kepada keluarga supaya kesejahteraan rohani dan fizikal seiring.']],
                    ['heading' => 'Cadangkan program', 'paragraphs' => ['Ada idea kuliah, program keluarga atau inisiatif kerohanian di kawasan anda? Sampaikan melalui aspirasi supaya ia dapat dinilai dan disusun bersama jentera setempat.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 5,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'ekonomi-keusahawanan',
                'title' => 'Ekonomi & Keusahawanan',
                'short_desc' => 'Sokongan keusahawanan dan peluang ekonomi untuk warga.',
                'image_path' => 'assets/program-ekonomi.jpg',
                'lead' => 'Program ini memberi tumpuan kepada ekonomi akar umbi dan usahawan kecil di Putrajaya — supaya rezeki tempatan tumbuh dengan jaringan, kemahiran dan keyakinan yang lebih kukuh.',
                'sections' => json_encode([
                    ['heading' => 'Sokongan usahawan komuniti', 'paragraphs' => ['Kami percaya pertumbuhan ekonomi tempatan bermula daripada usahawan yang dikenali jiran, dilatih dengan asas yang betul, dan dihubungkan kepada peluang yang relevan.'], 'bullets' => ['Pendedahan keusahawanan dan mindset perniagaan untuk warga serta belia.', 'Jaringan usahawan komuniti untuk berkongsi pengalaman dan peluang.', 'Kemahiran asas jualan, promosi dan digital yang praktikal.', 'Pautan ke program kemahiran dan saluran bantuan apabila relevan kepada keperluan isi rumah.']],
                    ['heading' => 'Bina bersama', 'paragraphs' => ['Ceritakan cabaran perniagaan mikro anda, idea gerai komuniti, atau keperluan latihan. Aspirasi ini membantu kami menyusun program yang benar-benar menyentuh lapangan.']],
                ]),
                'cta' => json_encode(['primary' => ['label' => 'Hantar Aspirasi', 'href' => 'sertai'], 'secondary' => ['label' => 'Lihat semua program', 'href' => 'program-list']]),
                'sort_order' => 6,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
