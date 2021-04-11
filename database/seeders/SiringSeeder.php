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
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '1',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Bongkar',
            'description_siring' => 'Pengajuan Perizinan Bongkar Barang Impor di Luar Kawasan Pabean',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-database"></i>',
            'is_priority' => '2',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Muat',
            'description_siring' => 'Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D)',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '3',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Muat',
            'description_siring' => 'Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D)',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '4',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Muat',
            'description_siring' => 'Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D)',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '5',
            'creator_id' => '1'
        ]);

        Siring::create([
            'name_siring' => 'Izin Muat',
            'description_siring' => 'Pengajuan Perizinan Muat Barang Ekspor di Luar Kawasan Pabean (Form 3D)',
            'link_siring' => 'https://bckotabaru.net/e-aplikasi/Izin%20Muat/Login%20IM%20Eksportir.php',
			'icon_siring' => '<i class="fa fa-stack-overflow"></i>',
            'is_priority' => '6',
            'creator_id' => '1'
        ]);
    }
}
