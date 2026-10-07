@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')
<h1>Data Dokter</h1>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Spesialisasi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($doctors as $doctor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $doctor['nama'] }}</td>
                <td>{{ $doctor['spesialisasi'] }}</td>
                <td>
                    @if ($doctor['status'] === 'aktif')
                        <span>Aktif</span>
                    @elseif ($doctor['status'] === 'cuti')
                        <span>Cuti</span>
                    @else
                        <span>Nonaktif</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada data dokter.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection