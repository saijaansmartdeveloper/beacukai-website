<?php

namespace Database\Seeders;


use App\Models\Layanan;
use Illuminate\Database\Seeder;

class JanjiLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan::create([
            'nama_layanan'      => 'Izin Muat Ekspor',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 6 (Enam) Jam',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Izin Bongkar Impor',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 6 (Enam) Jam',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Izin Timbun Impor',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 6 (Enam) Jam',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Redress Manifes',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Senin-Jumat (07.30-17.00)',
            'estimasi_layanan'  => 'Max. 1 (Satu) Hari Kerja',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Pemberitahuan Impor Barang (BC 2.0)',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 30 (Dua Puluh) Menit',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Pemberitahuan Ekspor Barang (BC 3.0)',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Senin-Jumat (07.30-17.00)',
            'estimasi_layanan'  => 'Max. 20 (Dua Puluh) Menit',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Impor Angkut Lanjut (BC 1.2)',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 30 (Dua Puluh) Menit',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);

        Layanan::create([
            'nama_layanan'      => 'Impor Tujuan Kawasan Berikat (BC 2.3)',
            'jenis_layanan'     => 'Sistem Online',
            'waktu_layanan'     => 'Pelayanan 24 x 7',
            'estimasi_layanan'  => 'Max. 60 (Dua Puluh) Menit',
            'biaya_layanan'     => 'GRATIS',
            'creator_id'        => 1
        ]);
    }
}
