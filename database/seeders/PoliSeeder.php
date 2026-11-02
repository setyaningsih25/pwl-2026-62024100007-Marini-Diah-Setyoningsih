<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        $polis = [
            ['POL001', 'Poli Umum',           'Pemeriksaan kesehatan umum'],
            ['POL002', 'Poli Gigi',           'Perawatan dan pengobatan gigi'],
            ['POL003', 'Poli Anak',           'Kesehatan tumbuh kembang anak'],
            ['POL004', 'Poli Kandungan',      'Kesehatan ibu dan kandungan'],
            ['POL005', 'Poli Penyakit Dalam', 'Penanganan organ dalam dewasa'],
            ['POL006', 'Poli Kulit',          'Penanganan penyakit kulit dan kelamin'],
            ['POL007', 'Poli Mata',           'Pemeriksaan dan perawatan mata'],
            ['POL008', 'Poli THT',            'Telinga, hidung, dan tenggorokan'],
            ['POL009', 'Poli Bedah',          'Tindakan bedah dan konsultasi bedah'],
        ];

        foreach ($polis as $p) {
            Poli::updateOrCreate(
                ['code' => $p[0]],
                ['name' => $p[1], 'description' => $p[2], 'is_active' => true]
            );
        }
    }
}