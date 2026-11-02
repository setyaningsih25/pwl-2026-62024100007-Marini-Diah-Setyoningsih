@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard Klinik</h1>
    <p>Selamat datang di Sistem Informasi Klinik.</p>

    <h3>Informasi Klinik</h3>
    <ul>
        <li>Jumlah Pasien: {{ $jumlahPasien }}</li>
        <li>Jumlah Dokter: {{ $jumlahDokter }}</li>
        <li>Jumlah Poli: {{ $jumlahPoli }}</li>
    </ul>
@endsection