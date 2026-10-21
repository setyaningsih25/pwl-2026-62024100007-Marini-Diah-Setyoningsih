<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Poli;

class DoctorController extends Controller
{
    public function index()
    {
        // Menggunakan eager loading sesuai materi praktikum pertemuan 6[cite: 23, 26]
        $doctors = Doctor::with('poli')->get(); 

        return view('dokter.index', compact('doctors'));
        // Baris <td> yang tadi di sini sudah DIHAPUS agar bersih dan hijau kembali!
    }

    public function create()
    {
        $polis = Poli::where('is_active', true)->orderBy('name')->get();
        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code' => 'required|unique:doctors,doctor_code',
            'name' => 'required|max:255',
            'specialization' => 'required|max:255',
            'phone' => 'nullable|max:20',
            'is_active' => 'required|boolean',
            'poli_id' => 'required|exists:polis,id', 
        ]);

        Doctor::create($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }
}