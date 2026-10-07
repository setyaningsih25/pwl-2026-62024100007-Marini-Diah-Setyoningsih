<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{ // <-- Kurung kurawal pembuka class (baris 8)
    public function index()
    { // <-- Kurung kurawal pembuka function
        $doctors = [
            ['nama' => 'dr. Andi Pratama', 'spesialisasi' => 'Umum', 'status' => 'Aktif'],
            ['nama' => 'dr. Budi Santoso', 'spesialisasi' => 'Anak', 'status' => 'Aktif'],
            ['nama' => 'dr. Citra Dewi', 'spesialisasi' => 'Gigi', 'status' => 'Aktif'],
            ['nama' => 'dr. Dian Lestari', 'spesialisasi' => 'Mata', 'status' => 'Aktif'],
            ['nama' => 'dr. Eko Wijaya', 'spesialisasi' => 'Penyakit Dalam', 'status' => 'Aktif'],
        ];

        return view('dokter.index', compact('doctors'));
    } // <-- Kurung kurawal penutup function (baris 20)
} // <-- TAMBAHKAN INI DI AKHIR FILE