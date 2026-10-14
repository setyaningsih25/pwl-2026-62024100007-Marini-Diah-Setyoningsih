<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Poli</title>
</head>
<body>
    <h1>Daftar Poli Sistem Informasi Klinik</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="{{ route('poli.create') }}">+ Tambah Poli Baru</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
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
                    <td>{{ $poli->is_active ? 'Aktif' : 'Non-Aktif' }}</td>
                    <td>
                        <a href="{{ route('poli.edit', $poli->id) }}">Edit</a>
                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data poli.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>