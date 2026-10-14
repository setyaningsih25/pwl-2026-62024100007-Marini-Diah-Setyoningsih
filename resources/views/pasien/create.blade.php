<form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <label>No. Rekam Medis</label>
    <input type="text" name="medical_record_number" value="{{ old('medical_record_number') }}">
    @error('medical_record_number')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label>Gender (L/P)</label>
    <input type="text" name="gender" value="{{ old('gender') }}">
    @error('gender')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <!-- Field lainnya sesuai kebutuhan -->
    <button type="submit">Simpan</button>
</form>