<?php

namespace App\Http\Controllers;

class DoctorController extends Controller
{
    public function index()
    {
        $judul = 'Data Dokter';
        return view('dokter.index', compact('judul'));
    }
}