@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST" style="max-width: 600px;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">No. Rekam Medis</label>
                <input type="text" name="medical_record_number" class="form-control" value="{{ old('medical_record_number', $pasien->medical_record_number) }}">
                @error('medical_record_number') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $pasien->name) }}">
                @error('name') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option value="L" @selected(old('gender', $pasien->gender) === 'L')>Laki-laki</option>
                    <option value="P" @selected(old('gender', $pasien->gender) === 'P')>Perempuan</option>
                </select>
                @error('gender') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $pasien->birth_date) }}">
                @error('birth_date') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address', $pasien->address) }}</textarea>
                @error('address') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $pasien->phone) }}">
                @error('phone') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection