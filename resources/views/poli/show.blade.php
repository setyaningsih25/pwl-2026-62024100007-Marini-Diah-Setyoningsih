<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Poli</title>
</head>
<body>
    <h1>Detail Poli: {{ $poli->name }}</h1>
    <p><strong>Kode:</strong> {{ $poli->code }}</p>
    <p><strong>Deskripsi:</strong> {{ $poli->description ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $poli->is_active ? 'Aktif' : 'Non-Aktif' }}</p>

    <hr>

    <h3>Daftar Dokter di Poli Ini:</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($poli->doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->doctor_code }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->phone ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada dokter yang terdaftar pada poli ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('poli.index') }}">Kembali ke Daftar Poli</a>
</body>
</html>