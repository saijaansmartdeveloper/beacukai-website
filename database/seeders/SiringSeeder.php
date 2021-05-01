<?php

namespace Database\Seeders;

use App\Models\Siring;
use Illuminate\Database\Seeder;

class SiringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siring::create([
            'name_siring' => 'Izin Muat',
            'description_siring' => 'Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D)',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-truck"></i>',
            'is_priority' => '1',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Bongkar',
            'description_siring' => 'Pengajuan Perizinan Bongkar Barang Impor di Luar Kawasan Pabean.',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Bongkar/Login%20IB%20Agen.php',
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '2',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Timbun',
            'description_siring' => 'Pengajuan Perizinan Timbun Barang Impor di Luar Kawasan Pabean.',
            'link_siring' => 'Pengajuan Perizinan Timbun Barang Impor di Luar Kawasan Pabean.',
			'icon_siring' => '<i class="fa fa-database"></i>',
            'is_priority' => '3',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Reddres Manifest',
            'description_siring' => 'Pengajuan Reddress Manifes.',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Ijin%20Redress/Login%20IB%20Agen.php',
			'icon_siring' => '<i class="fa fa-file-text"></i>',
            'is_priority' => '4',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Boatzoeking',
            'description_siring' => 'Pengajuan Perizinan Pemeriksaan Sarana Pengangkut.',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-ship"></i>',
            'is_priority' => '5',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Pegawai',
            'description_siring' => 'Pelayanan aplikasi SIRING untuk Pegawai.',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/User%20Pegawai/Login%20Pegawai.php',
			'icon_siring' => '<i class="fa fa-user"></i>',
            'is_priority' => '6',
            'creator_id' => '1'
        ]);
    }
}
