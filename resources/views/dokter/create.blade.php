@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dokter.store') }}" method="POST" style="max-width: 600px;">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Dokter</label>
                <input type="text" name="doctor_code" class="form-control" value="{{ old('doctor_code') }}">
                @error('doctor_code') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Spesialisasi</label>
                <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
                @error('specialization') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Poli</label>
                <select name="poli_id" class="form-select">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}" @selected(old('poli_id') == $poli->id)>{{ $poli->name }}</option>
                    @endforeach
                </select>
                @error('poli_id') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1" @selected(old('is_active', '1') == '1')>Aktif</option>
                    <option value="0" @selected(old('is_active') === '0')>Tidak Aktif</option>
                </select>
                @error('is_active') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection