<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Urutan penting: Poli -> Doctor (butuh poli_id) -> Patient -> Registration.
     */
    public function run(): void
    {
        $this->call([
            PoliSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            RegistrationSeeder::class,
        ]);
    }
}