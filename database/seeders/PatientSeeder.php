<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            ['RM0001', 'Ahmad',  'L', '2000-05-10', 'Kudus',  '081234567890'],
            ['RM0002', 'Siti',   'P', '2001-08-15', 'Jepara', '081234567891'],
            ['RM0003', 'Budi',   'L', '1999-03-22', 'Pati',   '081234567892'],
            ['RM0004', 'Dewi',   'P', '2002-11-30', 'Demak',  '081234567893'],
            ['RM0005', 'Rizky',  'L', '1998-07-07', 'Kudus',  '081234567894'],
        ];

        // Total 35 pasien: pagination 10 data/halaman = 4 halaman
        $extra = [
            ['Ahmad Fauzi',     'L', 'Kudus'],
            ['Siti Aminah',     'P', 'Jepara'],
            ['Budi Santoso',    'L', 'Pati'],
            ['Dewi Lestari',    'P', 'Demak'],
            ['Rizky Ramadhan',  'L', 'Semarang'],
            ['Nur Hidayah',     'P', 'Kudus'],
            ['Agus Setiawan',   'L', 'Jepara'],
            ['Rina Wulandari',  'P', 'Pati'],
            ['Eko Prasetyo',    'L', 'Demak'],
            ['Fitri Handayani', 'P', 'Kudus'],
            ['Dedi Kurniawan',  'L', 'Semarang'],
            ['Lestari Ayu',     'P', 'Jepara'],
            ['Hendra Gunawan',  'L', 'Pati'],
            ['Maya Sari',       'P', 'Demak'],
            ['Joko Susilo',     'L', 'Kudus'],
            ['Putri Anggraini', 'P', 'Semarang'],
            ['Bambang Hartono', 'L', 'Jepara'],
            ['Wulan Safitri',   'P', 'Pati'],
            ['Andi Wijaya',     'L', 'Demak'],
            ['Yuni Astuti',     'P', 'Kudus'],
            ['Fajar Nugraha',   'L', 'Semarang'],
            ['Ratna Dewi',      'P', 'Jepara'],
            ['Imam Syafii',     'L', 'Pati'],
            ['Sri Rahayu',      'P', 'Demak'],
            ['Taufik Hidayat',  'L', 'Kudus'],
            ['Intan Permata',   'P', 'Semarang'],
            ['Yoga Pratama',    'L', 'Jepara'],
            ['Nia Kurniasih',   'P', 'Pati'],
            ['Galih Saputra',   'L', 'Demak'],
            ['Anisa Rahma',     'P', 'Kudus'],
        ];

        foreach ($extra as $i => $e) {
            $no = $i + 6;
            $patients[] = [
                sprintf('RM%04d', $no),
                $e[0],
                $e[1],
                sprintf('%d-%02d-%02d', 1980 + ($i % 25), ($i % 12) + 1, ($i % 27) + 1),
                $e[2],
                sprintf('08123456%04d', 7000 + $no),
            ];
        }

        foreach ($patients as $p) {
            Patient::updateOrCreate(
                ['medical_record_number' => $p[0]],
                [
                    'name'       => $p[1],
                    'gender'     => $p[2],
                    'birth_date' => $p[3],
                    'address'    => $p[4],
                    'phone'      => $p[5],
                ]
            );
        }
    }
}