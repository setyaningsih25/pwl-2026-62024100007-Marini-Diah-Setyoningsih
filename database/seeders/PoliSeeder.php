<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['code' => 'POL-01', 'name' => 'Poli Umum', 'description' => 'Pelayanan kesehatan umum dasar', 'is_active' => true],
            ['code' => 'POL-02', 'name' => 'Poli Gigi', 'description' => 'Perawatan dan pengobatan gigi dan mulut', 'is_active' => true],
            ['code' => 'POL-03', 'name' => 'Poli Anak', 'description' => 'Kesehatan khusus anak dan imunisasi', 'is_active' => true],
            ['code' => 'POL-04', 'name' => 'Poli Kandungan', 'description' => 'Konsultasi kehamilan dan kandungan', 'is_active' => true],
            ['code' => 'POL-05', 'name' => 'Poli Penyakit Dalam', 'description' => 'Penanganan organ dalam dewasa', 'is_active' => true],
        ];

        foreach ($data as $item) {
            Poli::create($item);
        }
    }
}