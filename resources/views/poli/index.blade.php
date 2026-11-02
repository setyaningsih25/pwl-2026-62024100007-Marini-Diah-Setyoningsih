@extends('layouts.app')
@section('title', 'Data Poli')

@section('content')
<h1>Data Poli</h1>
<a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Poli</th>
            <th>Nama Poli</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($polis as $poli)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $poli->code }}</td>
                <td>{{ $poli->name }}</td>
                <td>{{ $poli->description ?? '-' }}</td>
                <td>
                    <span class="badge {{ $poli->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                        {{ $poli->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('poli.show', $poli->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus poli ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Belum ada data poli.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection