@extends('layouts.app')

@section('title', 'Detail Dokter')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="max-width: 600px;">
            <tr><th style="width: 200px;">Kode Dokter</th><td>{{ $doctor->doctor_code }}</td></tr>
            <tr><th>Nama</th><td>{{ $doctor->name }}</td></tr>
            <tr><th>Spesialisasi</th><td>{{ $doctor->specialization }}</td></tr>
            <tr><th>Poli</th><td>{{ $doctor->poli->name ?? '-' }}</td></tr>
            <tr><th>No. Telepon</th><td>{{ $doctor->phone ?? '-' }}</td></tr>
            <tr><th>Status</th><td>{{ $doctor->is_active ? 'Aktif' : 'Tidak Aktif' }}</td></tr>
        </table>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection