<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $patientIds = Patient::orderBy('id')->pluck('id')->all();
        $doctorIds  = Doctor::where('is_active', true)->orderBy('id')->pluck('id')->all();

        if (empty($patientIds) || empty($doctorIds) || Registration::count() > 0) {
            return;
        }

        $statuses   = ['waiting', 'examined', 'finished'];
        $complaints = [
            'Demam dan batuk', 'Sakit kepala', 'Nyeri gigi', 'Sakit perut',
            'Kontrol rutin', 'Gatal pada kulit', 'Mata merah', 'Nyeri tenggorokan',
        ];

        for ($i = 0; $i < 30; $i++) {
            Registration::create([
                'patient_id'        => $patientIds[$i % count($patientIds)],
                'doctor_id'         => $doctorIds[$i % count($doctorIds)],
                'registration_date' => now()->subDays($i % 15)->toDateString(),
                'complaint'         => $complaints[$i % count($complaints)],
                'status'            => $statuses[$i % count($statuses)],
            ]);
        }
    }
}