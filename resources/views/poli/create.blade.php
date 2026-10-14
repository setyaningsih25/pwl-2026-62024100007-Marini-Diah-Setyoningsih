<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Poli</title>
</head>
<body>
    <h1>Tambah Data Poli Baru</h1>

    <form action="{{ route('poli.store') }}" method="POST">
        @csrf

        <div>
            <label>Kode Poli:</label><br>
            <input type="text" name="code" value="{{ old('code') }}">
            @error('code') <div style="color: red;">{{ $message }}</div> @error
        </div>
        <br>

        <div>
            <label>Nama Poli:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div style="color: red;">{{ $message }}</div> @error
        </div>
        <br>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description') <div style="color: red;">{{ $message }}</div> @error
        </div>
        <br>

        <div>
            <label>Status:</label><br>
            <select name="is_active">
                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
            @error('is_active') <div style="color: red;">{{ $message }}</div> @error
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('poli.index') }}">Kembali</a>
    </form>
</body>
</html>