<?php

namespace Database\Seeders;

use App\Models\Penerima;
use App\Models\Pendaftar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContohPendaftarPenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pendaftar::insert([
            [
                'nama' => 'Dian',
                'nik' => '3333444455',
                'alamat' => 'Jl. Banten No. 1',
                'tanggal_daftar' => '2025-06-10',
            ],
            [
                'nama' => 'Agus',
                'nik' => '5566778899',
                'alamat' => 'Jl. Mawar No. 2',
                'tanggal_daftar' => '2025-06-12',
            ]
        ]);

        Penerima::insert([
            [
                'nama' => 'Wati',
                'nik' => '9988776655',
                'alamat' => 'Jl. Kenanga No. 3',
                'tanggal_terima' => '2025-06-14',
            ],
            [
                'nama' => 'Rian',
                'nik' => '7766554433',
                'alamat' => 'Jl. Sawo No. 4',
                'tanggal_terima' => '2025-06-16',
            ]
        ]);
    }
}
