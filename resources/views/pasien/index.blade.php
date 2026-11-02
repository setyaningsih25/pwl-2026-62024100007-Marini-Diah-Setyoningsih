@extends('layouts.app')
@section('title', 'Data Pasien')

@section('content')
<h1>Data Pasien</h1>
<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

<form method="GET" action="{{ route('pasien.index') }}" class="row g-2 mb-3">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama / No. RM">
    </div>
    <div class="col-md-2">
        <select name="gender" class="form-select">
            <option value="">Semua Gender</option>
            <option value="L" @selected(request('gender') === 'L')>Laki-laki</option>
            <option value="P" @selected(request('gender') === 'P')>Perempuan</option>
        </select>
    </div>
    <div class="col-md-2">
        <select name="direction" class="form-select">
            <option value="asc" @selected(request('direction', 'asc') === 'asc')>Nama A-Z</option>
            <option value="desc" @selected(request('direction') === 'desc')>Nama Z-A</option>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Terapkan</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>No. Rekam Medis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $patients->firstItem() + $loop->index }}</td>
                <td>{{ $patient->medical_record_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->birth_date ?? '-' }}</td>
                <td>{{ $patient->address ?? '-' }}</td>
                <td>{{ $patient->phone ?? '-' }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $patient->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasien.destroy', $patient->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data pasien?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">
                    Data pasien tidak ditemukan. <a href="{{ route('pasien.index') }}">Reset filter</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $patients->links() }}
@endsection