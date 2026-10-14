<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); // Mengambil data asli dari database sesuai materi CRUD

        return view('pasien.index', compact('patients'));
    }
   
    public function show($id)
    {
        return 'Menampilkan pasien dengan ID: ' . $id;
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_record_number' => 'required|unique:patients,medical_record_number',
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan.');
    }
    public function edit(Patient $pasien)
{
    return view('pasien.edit', compact('pasien'));
}
public function update(Request $request, Patient $pasien)
{
    $validated = $request->validate([
        'medical_record_number' => [
            'required',
            Rule::unique('patients', 'medical_record_number')->ignore($pasien->id),
        ],
        'name' => 'required|max:255',
        'gender' => 'required|in:L,P',
        'birth_date' => 'required|date',
        'address' => 'nullable|string',
        'phone' => 'nullable|max:20',
    ]);

    $pasien->update($validated);

    return redirect()
        ->route('pasien.index')
        ->with('success', 'Data pasien berhasil diperbarui.');
}
    public function destroy(Patient $pasien)
{
    $pasien->delete();

    return redirect()
        ->route('pasien.index')
        ->with('success', 'Data pasien berhasil dihapus.');
}
}