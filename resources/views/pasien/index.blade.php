@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<h1>Data Pasien</h1>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patient['nama'] }}</td>
                <td>{{ $patient['alamat'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada data pasien.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@extends('layouts.app')   {{-- sesuaikan dengan layout Anda --}}

@section('content')
<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>No. RM</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($patients as $patient)
            <tr>
                <td>{{ $patient->medical_record_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->gender }}</td>
                <td>
                    <form action="{{ route('pasien.destroy', $patient->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus data pasien?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada data pasien.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $patients->links() }}
@endsection