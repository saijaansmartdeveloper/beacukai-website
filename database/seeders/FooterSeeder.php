<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::create([
            'nama_instansi'         => 'BCKotabaru',
            'deskripsi_instansi'    => 'Kantor Pengawasan dan Pelayanan Bea dan Cukai Tipe Madya Pabean C Kotabaru berada di bawah Kantor Wilayah DJBC Kalimantan Bagian Selatan, merupakan salah satu unit kerja vertikal di bawah Direktorat Jenderal Bea dan Cukai pada Kementerian Keuangan Republik Indonesia.',
            'email_instansi'        => 'kppbckotabaru@gmail.com',
            'web_instansi'          => 'www.bckotabaru.net',
            'telp_instansi'         => '0812-5825-7525',
            'alamat_instansi'       => 'Jl. Pangeran Kesuma Negara 12 B Kotabaru, Kalimantan Selatan 72111',
            'maps_instansi'         => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4624998824697!2d116.22745961414053!3d-3.2344805976450886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2def31e82351e6d3%3A0x5f863fc0fa076e24!2sKANTOR%20BEA%20CUKAI%20KOTABARU!5e0!3m2!1sid!2sid!4v1574393905911!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
            'jam_kerja_instansi'    => 'Buka 24 Jam',
            'creator_id'            => '1'
        ]);
    }
}
