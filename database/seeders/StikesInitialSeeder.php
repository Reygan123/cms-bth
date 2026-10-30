<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StikesInitialSeeder extends Seeder
{
    /**
     * Run the database seeds for initial STIKes Budi Luhur Cimahi data.
     *
     * @return void
     */
    public function run()
    {
        // Identities
        if (DB::table('identities')->count() === 0) {
            DB::table('identities')->insert([
                'name'        => 'STIKes Budi Luhur Cimahi',
                'year'        => date('Y'),
                'description' => 'Penerimaan Mahasiswa Baru STIKes Budi Luhur Cimahi - Mencetak Tenaga Kesehatan Profesional, Unggul, dan Berkarakter.',
                'address'     => 'Jl. Kerkof No.243, Leuwigajah, Kec. Cimahi Selatan, Kota Cimahi, Jawa Barat 40532',
                'gmap'        => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8358485293285!2d107.5342416!3d-6.9102194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e51b32d0c24f%3A0x6b4ec2ea1712a3d!2sSTIKes%20Budi%20Luhur%20Cimahi!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'phone'       => '0823-1270-2385',
                'email'       => 'pmb@stikesbudiluhurcimahi.ac.id',
                'fb'          => 'stikesbudiluhurcimahi',
                'ig'          => 'stikesbudiluhurcimahi',
                'tt'          => 'stikesbudiluhurcimahi',
                'yt'          => 'stikesbudiluhurcimahi',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        // Visi
        if (DB::table('visis')->count() === 0) {
            DB::table('visis')->insert([
                'title'      => 'Visi STIKes Budi Luhur Cimahi',
                'subtitle'   => 'Arah & Komitmen Masa Depan',
                'visi'       => 'Menjadi Institusi Pendidikan Tinggi Kesehatan yang Unggul, Berkarakter, Berdaya Saing Global, dan Berorientasi pada Pelayanan Prima.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Misi
        if (DB::table('misis')->count() === 0) {
            $misiItems = [
                'Menyelenggarakan pendidikan kesehatan bermutu tinggi yang adaptif terhadap perkembangan ilmu pengetahuan dan teknologi.',
                'Melaksanakan penelitian inovatif di bidang kesehatan yang bermanfaat bagi masyarakat dan pengembangan ilmu.',
                'Melaksanakan pengabdian kepada masyarakat berbasis pemberdayaan kesehatan.',
                'Menjalin kemitraan strategis nasional dan internasional dalam penguatan tridharma perguruan tinggi.',
            ];

            foreach ($misiItems as $m) {
                DB::table('misis')->insert([
                    'misi'       => $m,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // About
        if (DB::table('abouts')->count() === 0) {
            DB::table('abouts')->insert([
                'title'       => 'Profil STIKes Budi Luhur Cimahi',
                'subtitle'    => 'Mencetak Tenaga Kesehatan Unggul dan Berkarakter',
                'description' => '<p>STIKes Budi Luhur Cimahi adalah perguruan tinggi kesehatan terkemuka di Kota Cimahi yang berkomitmen menghadirkan pendidikan berkualitas, fasilitas laboratorium berstandar industri, serta kurikulum yang relevan dengan kebutuhan pelayanan kesehatan masa kini.</p>',
                'content'     => '<p>Dengan didukung dosen berkompeten dan kemitraan rumah sakit terkemuka, lulusan STIKes Budi Luhur Cimahi siap bersaing secara nasional maupun internasional.</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
