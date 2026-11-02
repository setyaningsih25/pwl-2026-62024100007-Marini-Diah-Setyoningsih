<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        // [kode, nama, spesialisasi, telepon, aktif, kode poli]
        $doctors = [
            ['DR001', 'dr. Andi Pratama',   'Umum',           '081200000001', true,  'POL001'],
            ['DR002', 'dr. Lina Marlina',   'Anak',           '081200000002', true,  'POL003'],
            ['DR003', 'dr. Hendra Wijaya',  'Penyakit Dalam', '081200000003', true,  'POL005'],
            ['DR004', 'dr. Sari Utami',     'Kulit',          '081200000004', true,  'POL006'],
            ['DR005', 'dr. Bayu Santoso',   'Bedah',          null,           false, 'POL009'],
            ['DR006', 'dr. Maya Putri',     'Mata',           '081200000006', true,  'POL007'],
            ['DR007', 'dr. Fajar Nugroho',  'THT',            '081200000007', false, 'POL008'],
            ['DR008', 'dr. Rina Kusuma',    'Gigi',           '081200000008', true,  'POL002'],
            ['DR009', 'dr. Dimas Anggara',  'Umum',           '081200000009', true,  'POL001'],
            ['DR010', 'dr. Citra Maharani', 'Kandungan',      '081200000010', true,  'POL004'],
            ['DR011', 'dr. Rahmat Hidayat', 'Gigi',           '081200000011', false, 'POL002'],
            ['DR012', 'dr. Winda Pertiwi',  'Anak',           '081200000012', true,  'POL003'],
            ['DR013', 'dr. Teguh Prabowo',  'Penyakit Dalam', '081200000013', true,  'POL005'],
            ['DR014', 'dr. Larasati Dewi',  'Kandungan',      '081200000014', false, 'POL004'],
        ];

        foreach ($doctors as $d) {
            Doctor::updateOrCreate(
                ['doctor_code' => $d[0]],
                [
                    'name'           => $d[1],
                    'specialization' => $d[2],
                    'phone'          => $d[3],
                    'is_active'      => $d[4],
                    'poli_id'        => Poli::where('code', $d[5])->value('id'),
                ]
            );
        }
    }
}