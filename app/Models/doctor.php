<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
   public function run(): void
{
    $this->call([
        DoctorSeeder::class,
    ]);
    {
        $doctors = [
            ['doctor_code' => 'DR001', 'name' => 'dr. Budi Santoso, Sp.PD',  'specialization' => 'Penyakit Dalam', 'phone' => '081234500001', 'is_active' => true],
            ['doctor_code' => 'DR002', 'name' => 'dr. Rina Wulandari, Sp.A', 'specialization' => 'Anak',           'phone' => '081234500002', 'is_active' => true],
            ['doctor_code' => 'DR003', 'name' => 'dr. Andi Pratama, Sp.OG',  'specialization' => 'Kandungan',      'phone' => '081234500003', 'is_active' => true],
            ['doctor_code' => 'DR004', 'name' => 'dr. Siti Aisyah, Sp.KK',   'specialization' => 'Kulit dan Kelamin', 'phone' => null,         'is_active' => true],
            ['doctor_code' => 'DR005', 'name' => 'dr. Hendra Gunawan, Sp.B', 'specialization' => 'Bedah',          'phone' => '081234500005', 'is_active' => false],
            ['doctor_code' => 'DR006', 'name' => 'dr. Maya Lestari, Sp.M',   'specialization' => 'Mata',           'phone' => '081234500006', 'is_active' => true],
            ['doctor_code' => 'DR007', 'name' => 'dr. Faisal Rahman, Sp.THT','specialization' => 'THT',            'phone' => '081234500007', 'is_active' => false],
            ['doctor_code' => 'DR008', 'name' => 'dr. Dewi Kusuma',          'specialization' => 'Umum',           'phone' => '081234500008', 'is_active' => true],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}