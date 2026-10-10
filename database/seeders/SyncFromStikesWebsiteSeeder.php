<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SyncFromStikesWebsiteSeeder extends Seeder
{
    public function run()
    {
        // Hubungkan ke database lp_stikes2 (sumber data website utama STIKES)
        $stikesDb = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=lp_stikes2', 'root', '');
        $stikesDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        echo ">>> 1. Syncing Users...\n";
        $users = $stikesDb->query("SELECT * FROM `users`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($users as $u) {
            DB::table('users')->updateOrInsert(
                ['email' => $u['email']],
                [
                    'name'              => $u['name'],
                    'password'          => $u['password'],
                    'email_verified_at' => $u['email_verified_at'] ?: now(),
                    'remember_token'    => $u['remember_token'],
                    'created_at'        => $u['created_at'] ?: now(),
                    'updated_at'        => $u['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 2. Syncing Identities & Univ...\n";
        $identity = $stikesDb->query("SELECT * FROM `identities` LIMIT 1")->fetch(\PDO::FETCH_ASSOC);
        $univ = $stikesDb->query("SELECT * FROM `univ` LIMIT 1")->fetch(\PDO::FETCH_ASSOC);
        if ($identity || $univ) {
            DB::table('identities')->updateOrInsert(
                ['id' => 1],
                [
                    'name'        => ($identity['title'] ?? null) ?: 'STIKes Budi Luhur Cimahi',
                    'year'        => date('Y'),
                    'description' => ($identity['meta'] ?? null) ?: 'Penerimaan Mahasiswa Baru STIKes Budi Luhur Cimahi - Mencetak Tenaga Kesehatan Unggul dan Berkarakter.',
                    'address'     => strip_tags(($identity['adress'] ?? null) ?: 'Jl. Kerkof No. 243 Leuwigajah, Cimahi 40532, Jawa Barat'),
                    'gmap'        => ($identity['link_map'] ?? null) ?: ($univ['map'] ?? null),
                    'phone'       => ($identity['phone'] ?? null) ?: '(022) 667 4696',
                    'email'       => ($identity['email'] ?? null) ?: 'pmb@stikesbudiluhurcimahi.ac.id',
                    'fb'          => ($identity['fb'] ?? null) ?: 'https://www.facebook.com/STIKes-BUDI-LUHUR-CIMAHI-133049098766/',
                    'ig'          => ($identity['ig'] ?? null) ?: 'https://www.instagram.com/stikesbudiluhurcimahi/',
                    'tt'          => ($identity['tiktok'] ?? null) ?: '@universitas.budiluhur',
                    'yt'          => ($identity['yt'] ?? null) ?: 'https://www.youtube.com/@STIKesBudiLuhurCimahi',
                    'logo'        => ($identity['image1'] ?? null) ?: null,
                    'favicon'     => ($identity['image2'] ?? null) ?: null,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]
            );
        }

        echo ">>> 3. Syncing Fakultas / Faculties...\n";
        $faculties = $stikesDb->query("SELECT * FROM `faculties`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($faculties as $f) {
            DB::table('fakultas')->updateOrInsert(
                ['id' => $f['id']],
                [
                    'name'          => $f['name'],
                    'slug'          => $f['slug'] ?: Str::slug($f['name']),
                    'subtitle'      => $f['tagline'],
                    'yt_id'         => $f['yt_id'],
                    'title1'        => $f['title1'],
                    'description1'  => $f['description1'],
                    'statistik1'    => $f['statistik1'],
                    'statistik2'    => $f['statistik2'],
                    'statistik3'    => $f['statistik3'],
                    'statistik4'    => $f['statistik4'],
                    'tt'            => $f['tiktok'],
                    'ig'            => $f['instagram'],
                    'fb'            => $f['facebook'],
                    'yt'            => $f['youtube'],
                    'address'       => $f['address'],
                    'map'           => $f['map'],
                    'title2'        => $f['title2'],
                    'description2'  => $f['description2'],
                    'title3'        => $f['title3'],
                    'description3'  => $f['description3'],
                    'image1'        => $f['image1'] ?: ($univ['image1'] ?? null),
                    'image2'        => $f['image2'] ?: ($univ['image2'] ?? null),
                    'image3'        => $f['image3'] ?: ($univ['image3'] ?? null),
                    'image4'        => $f['image4'] ?: ($univ['image4'] ?? null),
                    'image5'        => $f['image5'],
                    'link_fakultas' => $f['link1'],
                    'created_at'    => $f['created_at'] ?: now(),
                    'updated_at'    => $f['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 4. Syncing Programs / Departements...\n";
        $departements = $stikesDb->query("SELECT * FROM `departements` WHERE `id` > 1")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($departements as $d) {
            $fakId = $d['fakultas_id'];
            if ($d['id'] == 10) {
                // Profesi Bidan belongs to Rumpun Ilmu Kebidanan
                $fakId = 1;
            }

            $img1 = $d['image1'] ?: 'departement-image/gedung.webp';
            $img2 = $d['image2'] ?: $img1;
            $img3 = $d['image3'] ?: $img1;
            $img4 = $d['image4'] ?: $img1;

            DB::table('programs')->updateOrInsert(
                ['id' => $d['id']],
                [
                    'name'         => $d['name'],
                    'slug'         => $d['slug'] ?: Str::slug($d['name']),
                    'tagline'      => $d['tagline'],
                    'akreditasi'   => $d['akreditasi'] ?: 'Baik',
                    'title1'       => $d['title1'] ?: ('Program Studi ' . $d['name']),
                    'title2'       => $d['title2'] ?: 'Visi & Misi',
                    'title3'       => $d['title3'] ?: 'Program Unggulan',
                    'title4'       => $d['title4'] ?: 'Gelar Lulusan & Prospek Karir',
                    'description1' => $d['description1'] ?: $d['tagline'],
                    'description2' => $d['description2'] ?: '<p>Menghasilkan lulusan yang kompeten, profesional, beretika, dan berdaya saing global.</p>',
                    'description3' => $d['description3'] ?: '<p>Kurikulum berbasis kompetensi dan teknologi informasi terkini.</p>',
                    'description4' => $d['description4'] ?: '<p>Peluang karir luas di rumah sakit nasional, internasional, dan fasilitas kesehatan mandiri.</p>',
                    'description'  => $d['tagline'],
                    'content'      => $d['description1'] ?: $d['tagline'],
                    'image'        => $img1,
                    'image1'       => $img1,
                    'image2'       => $img2,
                    'image3'       => $img3,
                    'image4'       => $img4,
                    'image_head'   => $img1,
                    'yt_id'        => $d['yt_id'] ?: 'KVBOdL3DUdk',
                    'id_yt'        => $d['yt_id'] ?: 'KVBOdL3DUdk',
                    'statistik1'   => $d['statistik1'] ?: '98%',
                    'statistik2'   => $d['statistik2'] ?: '100%',
                    'statistik3'   => $d['statistik3'] ?: 'A',
                    'statistik4'   => $d['statistik4'] ?: '500+',
                    'age'          => 'Reguler / Karyawan',
                    'weekly'       => 'Senin - Jumat',
                    'periode'      => 'Semester Ganjil ' . date('Y'),
                    'class_size'   => '30 Mahasiswa / Kelas',
                    'time_table'   => 'Pagi / Sore',
                    'investasi'    => $d['akreditasi'] ? "Akreditasi: {$d['akreditasi']}" : 'Terakreditasi BAN-PT/LAM-PTKes',
                    'created_at'   => $d['created_at'] ?: now(),
                    'updated_at'   => $d['updated_at'] ?: now(),
                ]
            );

            if (!empty($fakId)) {
                DB::table('fakultas_program')->updateOrInsert(
                    ['program_id' => $d['id'], 'fakultas_id' => $fakId],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        echo ">>> 5. Syncing Organizations / Organisasis...\n";
        $organizations = $stikesDb->query("SELECT * FROM `organizations`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($organizations as $org) {
            DB::table('organisasis')->updateOrInsert(
                ['id' => $org['id']],
                [
                    'name'             => $org['name'],
                    'title'            => $org['name'],
                    'description'      => $org['description'],
                    'category'         => $org['category'],
                    'program_id'       => $org['id_departement'] ?: 2,
                    'image'            => $org['image'],
                    'image1'           => $org['image1'],
                    'home'             => '1',
                    'fakultas_display' => '1',
                    'created_at'       => $org['created_at'] ?: now(),
                    'updated_at'       => $org['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 6. Syncing Facilities...\n";
        $facilities = $stikesDb->query("SELECT * FROM `facilities`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($facilities as $fac) {
            DB::table('facilities')->updateOrInsert(
                ['id' => $fac['id']],
                [
                    'title'            => $fac['title'],
                    'slug'             => Str::slug($fac['title']),
                    'description'      => $fac['description'] ?: $fac['subtitle'],
                    'image'            => $fac['image1'] ?: null,
                    'home'             => '1',
                    'fakultas_display' => '1',
                    'created_at'       => $fac['created_at'] ?: now(),
                    'updated_at'       => $fac['updated_at'] ?: now(),
                ]
            );

            // Relasikan facility dengan program prodi
            foreach ($departements as $d) {
                DB::table('facility_program')->updateOrInsert(
                    ['facility_id' => $fac['id'], 'program_id' => $d['id']],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        echo ">>> 7. Syncing USPs to Unggulans...\n";
        $usps = $stikesDb->query("SELECT * FROM `usps`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($usps as $u) {
            DB::table('unggulans')->updateOrInsert(
                ['id' => $u['id']],
                [
                    'title'       => $u['title'],
                    'slug'        => Str::slug($u['title']),
                    'image'       => $u['image'] ?: null,
                    'description' => $u['description'],
                    'link'        => '/pendaftaran',
                    'home'        => '1',
                    'program_id'  => $u['id_departement'] ?: 2,
                    'fakultas'    => '1',
                    'created_at'  => $u['created_at'] ?: now(),
                    'updated_at'  => $u['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 8. Syncing Testimonials / Testimonies...\n";
        $testimonials = $stikesDb->query("SELECT * FROM `testimonials`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($testimonials as $t) {
            DB::table('testimonies')->updateOrInsert(
                ['id' => $t['id']],
                [
                    'name'             => $t['name'],
                    'title'            => $t['title'],
                    'slug'             => Str::slug($t['name']),
                    'content'          => $t['description'],
                    'image'            => $t['image'],
                    'yt_link'          => $t['yt'],
                    'user_id'          => 1,
                    'home'             => '1',
                    'fakultas_display' => '1',
                    'program_id'       => $t['id_departement'] ?: 2,
                    'created_at'       => $t['created_at'] ?: now(),
                    'updated_at'       => $t['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 9. Syncing Achievements / Prestasi...\n";
        DB::table('categoriprestasis')->updateOrInsert(
            ['id' => 1],
            ['name' => 'Akademik & Beasiswa', 'slug' => 'akademik-beasiswa', 'created_at' => now(), 'updated_at' => now()]
        );
        $achievements = $stikesDb->query("SELECT * FROM `achievements`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($achievements as $ach) {
            DB::table('prestasis')->updateOrInsert(
                ['id' => $ach['id']],
                [
                    'title'               => $ach['title'],
                    'slug'                => Str::slug($ach['title']),
                    'name'                => $ach['winner_name'] ?: $ach['name'],
                    'categoriprestasi_id' => 1,
                    'image'               => $ach['image'],
                    'home'                => '1',
                    'fakultas_display'    => '1',
                    'program_id'          => $ach['id_departement'] ?: 2,
                    'tanggal'             => $ach['date'] ?: date('Y-m-d'),
                    'created_at'          => $ach['created_at'] ?: now(),
                    'updated_at'          => $ach['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 10. Syncing Partners...\n";
        $partners = $stikesDb->query("SELECT * FROM `partners`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($partners as $p) {
            DB::table('partners')->updateOrInsert(
                ['id' => $p['id']],
                [
                    'name'         => $p['name'],
                    'slug'         => Str::slug($p['name']),
                    'description'  => $p['description'],
                    'program_desc' => $p['detail'] ?: $p['description'],
                    'web'          => $p['url'],
                    'image'        => $p['image'],
                    'created_at'   => $p['created_at'] ?: now(),
                    'updated_at'   => $p['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 11. Syncing Categories & Posts...\n";
        $categories = $stikesDb->query("SELECT * FROM `categories`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($categories as $c) {
            DB::table('categories')->updateOrInsert(
                ['id' => $c['id']],
                [
                    'name'       => $c['name'],
                    'slug'       => Str::slug($c['name']),
                    'image'      => $c['image'] ?: null,
                    'created_at' => $c['created_at'] ?: now(),
                    'updated_at' => $c['updated_at'] ?: now(),
                ]
            );
        }

        $posts = $stikesDb->query("SELECT * FROM `posts`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($posts as $post) {
            DB::table('posts')->updateOrInsert(
                ['id' => $post['id']],
                [
                    'title'       => $post['title'],
                    'slug'        => $post['slug'] ?: Str::slug($post['title']),
                    'category_id' => $post['id_category'] ?: 1,
                    'description' => $post['resume'],
                    'content'     => $post['content'],
                    'image'       => $post['image'],
                    'pub_date'    => $post['publish'] ?: date('Y-m-d'),
                    'user_id'     => 1,
                    'created_at'  => $post['created_at'] ?: now(),
                    'updated_at'  => $post['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 12. Syncing Agendas...\n";
        $agendas = $stikesDb->query("SELECT * FROM `agendas`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($agendas as $ag) {
            $startDate = !empty($ag['start_date']) ? date('Y-m-d', strtotime($ag['start_date'])) : date('Y-m-d');
            $endDate = !empty($ag['end_date']) ? date('Y-m-d', strtotime($ag['end_date'])) : date('Y-m-d');
            DB::table('agendas')->updateOrInsert(
                ['id' => $ag['id']],
                [
                    'title'      => $ag['title'],
                    'slug'       => $ag['slug'] ?: Str::slug($ag['title']),
                    'start_date' => $startDate,
                    'end_date'   => $endDate,
                    'start_time' => '08:00:00',
                    'end_time'   => '16:00:00',
                    'content'    => $ag['description'],
                    'location'   => $ag['location'],
                    'yt_link'    => $ag['yt'],
                    'image'      => $ag['image'],
                    'user_id'    => 1,
                    'created_at' => $ag['created_at'] ?: now(),
                    'updated_at' => $ag['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 13. Syncing Legal Documents...\n";
        $legals = $stikesDb->query("SELECT * FROM `legal_documents`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($legals as $l) {
            DB::table('legals')->updateOrInsert(
                ['id' => $l['id']],
                [
                    'title'       => $l['title'],
                    'description' => $l['description'] ?: ($l['sk'] . ' - ' . $l['akreditasi']),
                    'image'       => $l['image'],
                    'created_at'  => $l['created_at'] ?: now(),
                    'updated_at'  => $l['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 14. Syncing Sliders & Sidebanners...\n";
        DB::table('sliders')->updateOrInsert(
            ['id' => 1],
            [
                'title'       => 'Penerimaan Mahasiswa Baru STIKes Budi Luhur Cimahi',
                'slug'        => 'pmb-stikes-budi-luhur',
                'image'       => ($univ['image1'] ?? null) ?: 'faculty-image/TEA25aKWZkbL1D3oiGAieMvVW2B1nxv237PJJ4f4.jpg',
                'description' => 'Mencetak Tenaga Kesehatan Profesional, Unggul, dan Berakhlak Mulia yang Siap Bersaing Global.',
                'button'      => 'Daftar Sekarang',
                'link'        => '/pendaftaran',
                'home'        => '1',
                'program_id'  => 2,
                'yt_id'       => ($univ['yt_id'] ?? null) ?: 'KVBOdL3DUdk',
                'align'       => 'left',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );
        DB::table('sliders')->updateOrInsert(
            ['id' => 2],
            [
                'title'       => 'Pilihan Program Studi Kesehatan Terakreditasi',
                'slug'        => 'prodi-kesehatan-terakreditasi',
                'image'       => ($univ['image2'] ?? null) ?: 'faculty-image/NpBh2yI3Fa8DbFznVEu8BgnmD1XuTRNM4T0zC0At.jpg',
                'description' => 'Didukung laboratorium modern, dosen ahli, dan jejaring rumah sakit terkemuka.',
                'button'      => 'Lihat Program Studi',
                'link'        => '/fakultas',
                'home'        => '1',
                'program_id'  => 3,
                'yt_id'       => ($univ['yt_id'] ?? null) ?: 'KVBOdL3DUdk',
                'align'       => 'left',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );

        DB::table('sidebanners')->updateOrInsert(
            ['id' => 1],
            [
                'image'      => ($univ['image4'] ?? null) ?: 'faculty-image/CLqNf8XLHRdmkqzcZWjqVdORbWnQt5QvrvQFY4w5.jpg',
                'link'       => '/pendaftaran',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        echo ">>> 15. Syncing FAQs & FAQ Categories...\n";
        $faqCats = $stikesDb->query("SELECT * FROM `faq_categories`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($faqCats as $fc) {
            DB::table('kategori_faqs')->updateOrInsert(
                ['id' => $fc['id']],
                [
                    'title'       => $fc['name'],
                    'description' => $fc['name'],
                    'created_at'  => $fc['created_at'] ?: now(),
                    'updated_at'  => $fc['updated_at'] ?: now(),
                ]
            );
        }

        $faqs = $stikesDb->query("SELECT * FROM `faqs`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($faqs as $faq) {
            DB::table('faqs')->updateOrInsert(
                ['id' => $faq['id']],
                [
                    'title'       => $faq['question'],
                    'description' => $faq['answer'],
                    'created_at'  => $faq['created_at'] ?: now(),
                    'updated_at'  => $faq['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 16. Syncing Our Teams...\n";
        $ourteams = $stikesDb->query("SELECT * FROM `ourteams`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($ourteams as $ot) {
            DB::table('ourteams')->updateOrInsert(
                ['id' => $ot['id']],
                [
                    'program_id' => $ot['id_departement'] ?: null,
                    'title'      => $ot['title'] ?: 'Dosen / Pengajar',
                    'name'       => $ot['name'],
                    'fb'         => $ot['fb'],
                    'ig'         => $ot['ig'],
                    'tt'         => $ot['tiktok'],
                    'phone'      => $ot['phone'],
                    'email'      => $ot['email'],
                    'image'      => $ot['image'],
                    'home'       => '1',
                    'created_at' => $ot['created_at'] ?: now(),
                    'updated_at' => $ot['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 17. Syncing Benefits (Beasiswa)...\n";
        $beasiswa = $stikesDb->query("SELECT * FROM `beasiswa`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($beasiswa as $b) {
            DB::table('benefits')->updateOrInsert(
                ['id' => $b['id']],
                [
                    'title'       => $b['beasiswa_name'] ?: 'Program Beasiswa',
                    'slug'        => $b['slug'] ?: Str::slug($b['beasiswa_name'] ?: 'beasiswa'),
                    'description' => $b['deskripsi'],
                    'program_id'  => 2,
                    'image'       => $b['image'] ?: null,
                    'home'        => '1',
                    'created_at'  => $b['created_at'] ?: now(),
                    'updated_at'  => $b['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 18. Syncing Akademik...\n";
        $akademik = $stikesDb->query("SELECT * FROM `akademik`")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($akademik as $ak) {
            DB::table('akademik')->updateOrInsert(
                ['id' => $ak['id']],
                [
                    'title'       => $ak['title'],
                    'description' => $ak['description'],
                    'startDate'   => $ak['startDate'],
                    'endDate'     => $ak['endDate'],
                    'color'       => $ak['color'],
                    'created_at'  => $ak['created_at'] ?: now(),
                    'updated_at'  => $ak['updated_at'] ?: now(),
                ]
            );
        }

        echo ">>> 19. Syncing Visi, Misi, About & Statistik...\n";
        if ($univ) {
            DB::table('visis')->updateOrInsert(
                ['id' => 1],
                [
                    'title'      => 'Visi STIKes Budi Luhur Cimahi',
                    'subtitle'   => $univ['tagline'] ?: 'Arah & Komitmen Masa Depan',
                    'visi'       => $univ['tagline'] ?: 'Menjadi Perguruan Tinggi yang Religius, Berbudi Luhur dan Unggul di Tingkat Internasional',
                    'image'      => ($univ['image1'] ?? null) ?: 'faculty-image/TEA25aKWZkbL1D3oiGAieMvVW2B1nxv237PJJ4f4.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            DB::table('misis')->updateOrInsert(
                ['id' => 1],
                [
                    'title'      => 'Misi STIKes Budi Luhur Cimahi',
                    'subtitle'   => 'Langkah Strategis Mewujudkan Visi',
                    'misi'       => 'Menyelenggarakan pendidikan berkualitas, penelitian inovatif kesehatan, dan pengabdian masyarakat berorientasi mutu tinggi.',
                    'image'      => ($univ['image2'] ?? null) ?: 'faculty-image/NpBh2yI3Fa8DbFznVEu8BgnmD1XuTRNM4T0zC0At.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            DB::table('abouts')->updateOrInsert(
                ['id' => 1],
                [
                    'title'       => 'Profil STIKes Budi Luhur Cimahi',
                    'subtitle'    => $univ['tagline'] ?: 'Mencetak Tenaga Kesehatan Unggul dan Berkarakter',
                    'description' => $univ['description1'] ?: '<p>STIKes Budi Luhur Cimahi adalah perguruan tinggi kesehatan terkemuka di Kota Cimahi.</p>',
                    'content'     => $univ['description2'] ?: '<p>Didukung dosen profesional, laboratorium modern, dan rumah sakit mitra terkemuka.</p>',
                    'image'       => ($univ['image1'] ?? null) ?: 'faculty-image/TEA25aKWZkbL1D3oiGAieMvVW2B1nxv237PJJ4f4.jpg',
                    'image1'      => ($univ['image1'] ?? null) ?: 'faculty-image/TEA25aKWZkbL1D3oiGAieMvVW2B1nxv237PJJ4f4.jpg',
                    'image2'      => ($univ['image2'] ?? null) ?: 'faculty-image/NpBh2yI3Fa8DbFznVEu8BgnmD1XuTRNM4T0zC0At.jpg',
                    'video'       => ($univ['yt_id'] ?? null) ?: 'KVBOdL3DUdk',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]
            );

            DB::table('sambutans')->updateOrInsert(
                ['id' => 1],
                [
                    'name'        => 'Ketua STIKes Budi Luhur Cimahi',
                    'slug'        => 'sambutan-ketua',
                    'title'       => 'Selamat Datang di Portal Penerimaan Mahasiswa Baru',
                    'image'       => ($univ['image1'] ?? null) ?: 'faculty-image/TEA25aKWZkbL1D3oiGAieMvVW2B1nxv237PJJ4f4.jpg',
                    'description' => '<p>Selamat datang calon mahasiswa baru STIKes Budi Luhur Cimahi. Kami siap membimbing dan mengantarkan Anda menjadi tenaga kesehatan profesional berdaya saing global.</p>',
                    'video'       => ($univ['yt_id'] ?? null) ?: 'KVBOdL3DUdk',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]
            );
        }

        // Statistik (Svg)
        DB::table('svgs')->updateOrInsert(
            ['id' => 1],
            [
                'icon'       => 'bi-people',
                'nilai'      => 9112,
                'name'       => 'Alumni & Mahasiswa Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        echo ">>> 20. Syncing PMB Registration Tracks & Schedules...\n";
        $currentYear = date('Y');
        $tracks = [
            [
                'id'          => 1,
                'name'        => 'Jalur PMDK / Prestasi',
                'slug'        => 'jalur-pmdk-prestasi',
                'start_date'  => "$currentYear-01-01",
                'end_date'    => "$currentYear-04-30",
                'start_time'  => '08:00:00',
                'end_time'    => '17:00:00',
                'description' => 'Jalur penerimaan tanpa tes tulis berdasarkan prestasi akademik nilai rapor atau prestasi non-akademik (olahraga, seni, tahfidz).',
                'content'     => '<p>Persyaratan: Nilai rata-rata rapor semester 1-5 minimal 75, fotokopi sertifikat/piagam kejuaraan bagi prestasi non-akademik.</p>',
                'cta'         => 'Daftar Jalur Prestasi',
                'link'        => 'https://stikesbudiluhurcimahi.ac.id/',
                'pricing'     => 'Gratis Biaya Formulir',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 2,
                'name'        => 'Jalur Reguler (Tes CBT Online)',
                'slug'        => 'jalur-reguler',
                'start_date'  => "$currentYear-02-01",
                'end_date'    => "$currentYear-08-31",
                'start_time'  => '08:00:00',
                'end_time'    => '17:00:00',
                'description' => 'Jalur penerimaan mahasiswa baru melalui Computer Based Test (CBT) yang dapat dilakukan secara online maupun offline.',
                'content'     => '<p>Materi tes: Tes Potensi Akademik, Bahasa Inggris, IPA Dasar, dan Tes Kesehatan.</p>',
                'cta'         => 'Daftar Jalur Reguler',
                'link'        => 'https://stikesbudiluhurcimahi.ac.id/',
                'pricing'     => 'Rp 250.000',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 3,
                'name'        => 'Jalur Alih Jenjang & Profesi',
                'slug'        => 'jalur-alih-jenjang-profesi',
                'start_date'  => "$currentYear-01-15",
                'end_date'    => "$currentYear-09-15",
                'start_time'  => '08:00:00',
                'end_time'    => '17:00:00',
                'description' => 'Jalur lanjutan bagi lulusan D3 Keperawatan ke S1/Profesi Ners, atau D3 Kebidanan ke S1/Profesi Bidan.',
                'content'     => '<p>Persyaratan: Ijazah & Transkrip D3 Kebidanan / Keperawatan terlegalisir, STR/SIP, dan surat izin institusi tempat bekerja jika bekerja.</p>',
                'cta'         => 'Daftar Alih Jenjang',
                'link'        => 'https://stikesbudiluhurcimahi.ac.id/',
                'pricing'     => 'Rp 300.000',
                'status'      => 'Aktif'
            ],
        ];

        foreach ($tracks as $t) {
            DB::table('registrations')->updateOrInsert(
                ['id' => $t['id']],
                array_merge($t, ['created_at' => now(), 'updated_at' => now()])
            );

            // Hubungkan dengan seluruh prodi di registration_programs
            foreach ($departements as $d) {
                DB::table('registration_programs')->updateOrInsert(
                    ['registration_id' => $t['id'], 'program_id' => $d['id']],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        // Info daftars
        DB::table('infodaftars')->updateOrInsert(
            ['id' => 1],
            [
                'title'       => 'Informasi Pendaftaran PMB STIKes Budi Luhur Cimahi',
                'description' => 'Pendaftaran mahasiswa baru dibuka sepanjang tahun melalui gelombang pendaftaran dengan kemudahan sistem online.',
                'text_inves'  => 'Tersedia program beasiswa KIP Kuliah, beasiswa yayasan, dan beasiswa prestasi.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );

        // Type daftars
        DB::table('typedaftars')->updateOrInsert(
            ['id' => 1],
            [
                'title'      => 'Gelombang 1 (Gelombang Utama)',
                'start_date' => "$currentYear-01-01",
                'end_date'   => "$currentYear-04-30",
                'test_date'  => "$currentYear-05-05",
                'info_date'  => "$currentYear-05-10",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('typedaftars')->updateOrInsert(
            ['id' => 2],
            [
                'title'      => 'Gelombang 2',
                'start_date' => "$currentYear-05-01",
                'end_date'   => "$currentYear-07-31",
                'test_date'  => "$currentYear-08-05",
                'info_date'  => "$currentYear-08-10",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Link daftars
        DB::table('linkdaftars')->updateOrInsert(
            ['id' => 1],
            [
                'link'       => 'https://stikesbudiluhurcimahi.ac.id/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Tanggal penting
        DB::table('tanggalpentings')->updateOrInsert(
            ['id' => 1],
            [
                'date'        => "$currentYear-01-01",
                'title'       => 'Pembukaan Pendaftaran Gelombang 1',
                'description' => 'Pendaftaran online melalui website resmi PMB STIKes Budi Luhur Cimahi.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );
        DB::table('tanggalpentings')->updateOrInsert(
            ['id' => 2],
            [
                'date'        => "$currentYear-05-05",
                'title'       => 'Ujian Masuk CBT & Wawancara Gelombang 1',
                'description' => 'Pelaksanaan tes CBT online dan tes kesehatan.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );
        DB::table('tanggalpentings')->updateOrInsert(
            ['id' => 3],
            [
                'date'        => "$currentYear-08-30",
                'title'       => 'Pengenalan Kehidupan Kampus (PKKMB)',
                'description' => 'Orientasi mahasiswa baru STIKes Budi Luhur Cimahi.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        );

        echo ">>> SUCCESS: All necessary PMB data and images from lp_stikes2 synced perfectly into pmb_stikes2!\n";
    }
}
