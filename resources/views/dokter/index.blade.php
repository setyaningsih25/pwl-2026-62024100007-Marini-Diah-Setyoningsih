@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')
    <h1>Data Dokter</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Dokter</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Telepon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->doctor_code }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->phone ?? '-' }}</td>
                    <td>
                        @if ($doctor->is_active)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data dokter.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection