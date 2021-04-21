<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content  = "";
        $content .= '<a href="#"><h4 class="sec-head">Sekapur Sirih</h4></a>';
        $content .= '<p>Assalamu’alaikum Wr. Wb</p>';
        $content .= '<p>Salam sejahtera untuk kita semua,</p>';
        $content .= '<p style="text-align: justify;">Alhamdulillah kami ucapkan kepada Allah SWT, atas rahmat dan karunia yang telah diberikan sehingga penyempurnaan website Bea dan Cukai Kotabaru dapat diselesaikan. Tak lupa ucapan terima kasih yang sebesar-besarnya kepada Tim Pengelola Website Bea dan Cukai Kotabaru yang tanpa kenal lelah membuat penyempurnaan website dan pihak lain yang membantu terwujudnya website ini ditengah pekerjaan kantor yang padat dan juga tak dapat ditinggalkan.</p>';
        $content .= '<p style="text-align: justify;">Website ini kami perbaharui dengan beberapa penambahan fitur pada Aplikasi Online Simponi antara lain menu pemeriksaan sarana pengangkut, testimoni pengguna jasa, capaian survei kepuasan pengguna jasa, forum diskusi online serta beberapa fitur-fitur lainnya. Fitur tersebut semakin melengkapi fitur yang sudah ada di Aplikasi Online Simponi sebelumnya.</p>';
        $content .= '<p style="text-align: justify;">Kami sadar perubahan ini masih memungkinkan untuk terus mendapat penyempurnaan kedepannya. Untuk itu, kami sangat membutuhkan kritik dan saran yang membangun dari pengunjung website ini secara umum, maupun pengguna jasa Bea dan Cukai Kotabaru secara khusus. </p>';
        $content .= '<p style="text-align: justify;">Semoga dengan adanya penyempurnaan website ini dapat mewujudkan pelayanan yang prima dan tentunya Bea dan Cukai Kotabaru kedepan Makin Baik.</p>';
        $content .= '<p>Wassalamu’alaikum Wr. Wb.</p>';
        $content .= '</br>';
        $content .= '<p>BAGUS SULISTIJONO</p>';
        $content .= '<p>Kepala Kantor</p>';

        Page::create([
            'name_page'         => 'TENTANG BC KOTABARU',
            'slug'              => Str::slug('TENTANG BC KOTABARU'),
            'description_page'  => 'Profil Beacukai',
            'content_page'      => $content,
            'image_page'        => '',
            'creator_id'        => '1'
        ]);

        Page::create([
            'name_page'         => 'Struktur Organisasi',
            'slug'              => Str::slug('Struktur Organisasi'),
            'description_page'  => '',
            'content_page'      => '',
            'image_page'        => '',
            'creator_id'        => '1'
        ]);
    }
}
