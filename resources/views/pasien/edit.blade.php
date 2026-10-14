<form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name', $pasien->name) }}">
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>