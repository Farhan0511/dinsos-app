<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Masyarakat extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
       DB::table('masyarakats')->insert([
        'nama' => 'Mochamad Farhan Ferdiansyah',
        'email' => 'farhan@gmail.com',
        'alamat' => 'Serang Banten',
        'jenisKelamin' => 'laki-laki',
        'jenisBantuan' => 'Kursi Roda',
        'nomorTelepon' => '084651561',
       ]);
    }
}
