<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

use Illuminate\Http\Request;
use App\Models\Registration; // <-- PASTIKAN BARIS INI ADA DI ATAS

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['patient', 'doctor'])->get();
        return view('registration.index', compact('registrations'));
    }
}