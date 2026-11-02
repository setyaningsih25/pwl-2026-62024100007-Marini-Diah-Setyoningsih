<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        // Eager loading: patient, doctor, dan poli milik dokter
        $query = Registration::with(['patient', 'doctor.poli']);

        // Search berdasarkan nama pasien
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // Filter dokter
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        // Filter status (dibatasi nilai yang diizinkan)
        if (in_array($request->status, ['waiting', 'examined', 'finished'], true)) {
            $query->where('status', $request->status);
        }

        // Filter tanggal pendaftaran
        if ($request->filled('registration_date')) {
            $query->whereDate('registration_date', $request->registration_date);
        }

        // Sorting tanggal terbaru / terlama
        $direction = $request->sort === 'oldest' ? 'asc' : 'desc';
        $query->orderBy('registration_date', $direction)->orderBy('id', $direction);

        $registrations = $query->paginate(10)->withQueryString();
        $doctors = Doctor::orderBy('name')->get();

        return view('registrations.index', compact('registrations', 'doctors'));
    }
}