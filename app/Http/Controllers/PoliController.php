<?php

namespace App\Http\Controllers;

class PoliController extends Controller
{
    public function index()
    {
        $judul = 'Data Poli';
        return view('poli.index', compact('judul'));
    }
}