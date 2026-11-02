<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::with('poli');

        // 1. Search berdasarkan nama atau kode dokter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('doctor_code', 'like', "%{$search}%");
            });
        }

        // 2. Filter berdasarkan Poli
        if ($request->filled('poli_id')) {
            $query->where('poli_id', $request->poli_id);
        }

        // 3. Filter berdasarkan status aktif (1 = aktif, 0 = tidak aktif)
        if ($request->filled('is_active') && in_array($request->is_active, ['0', '1'], true)) {
            $query->where('is_active', $request->is_active);
        }

        // 4. Sorting (whitelist kolom)
        $sortable  = ['name', 'doctor_code', 'specialization'];
        $sort      = in_array($request->sort, $sortable) ? $request->sort : 'name';
        $direction = $request->direction === 'desc' ? 'desc' : 'asc';
        $query->orderBy($sort, $direction);

        // 5. Pagination 10 data + pertahankan query string
        $doctors = $query->paginate(10)->withQueryString();
        $polis   = Poli::where('is_active', true)->orderBy('name')->get();

        return view('dokter.index', compact('doctors', 'polis'));
    }

    public function create()
    {
        $polis = Poli::orderBy('name')->get();
        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code'    => 'required|unique:doctors,doctor_code',
            'name'           => 'required|max:255',
            'specialization' => 'required',
            'phone'          => 'nullable|max:20',
            'is_active'      => 'required|boolean',
            'poli_id'        => 'required|exists:polis,id',
        ]);

        Doctor::create($validated);

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function show($id)
    {
        $doctor = Doctor::with('poli')->findOrFail($id);
        return view('dokter.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $polis  = Poli::orderBy('name')->get();

        return view('dokter.edit', compact('doctor', 'polis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'doctor_code'    => 'required|unique:doctors,doctor_code,' . $id,
            'name'           => 'required|max:255',
            'specialization' => 'required',
            'phone'          => 'nullable|max:20',
            'is_active'      => 'required|boolean',
            'poli_id'        => 'required|exists:polis,id',
        ]);

        Doctor::findOrFail($id)->update($validated);

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diubah.');
    }

    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}