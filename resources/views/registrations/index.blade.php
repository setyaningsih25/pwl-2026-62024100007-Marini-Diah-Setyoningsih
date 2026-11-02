@extends('layouts.app')

@section('title', 'Data Pendaftaran')

@section('content')
<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('registrations.index') }}" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pasien..." style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px; flex: 1; min-width: 180px;">

            <select name="doctor_id" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
                <option value="">-- Semua Dokter --</option>
                @foreach ($doctors as $doc)
                    <option value="{{ $doc->id }}" @selected(request('doctor_id') == $doc->id)>{{ $doc->name }}</option>
                @endforeach
            </select>

            <select name="status" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
                <option value="">-- Semua Status --</option>
                <option value="waiting" @selected(request('status') === 'waiting')>Waiting</option>
                <option value="examined" @selected(request('status') === 'examined')>Examined</option>
                <option value="finished" @selected(request('status') === 'finished')>Finished</option>
            </select>

            <input type="date" name="registration_date" value="{{ request('registration_date') }}" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">

            <select name="sort" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
                <option value="latest" @selected(request('sort') !== 'oldest')>Terbaru</option>
                <option value="oldest" @selected(request('sort') === 'oldest')>Terlama</option>
            </select>

            <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-weight: bold;">Terapkan</button>
            <a href="{{ route('registrations.index') }}" style="background-color: #6c757d; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">Reset Filter</a>
        </form>

        @if (request('search'))
            <p>Hasil pencarian: <strong>{{ request('search') }}</strong></p>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th>Tanggal</th>
                        <th>Nama Pasien</th>
                        <th>Dokter Tujuan</th>
                        <th>Poli</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $index => $item)
                        <tr>
                            <td>{{ $registrations->firstItem() + $index }}</td>
                            <td>{{ $item->registration_date }}</td>
                            <td>{{ $item->patient->name ?? '-' }}</td>
                            <td>{{ $item->doctor->name ?? '-' }}</td>
                            <td>{{ $item->doctor->poli->name ?? '-' }}</td>
                            <td>{{ $item->complaint ?? '-' }}</td>
                            <td>{{ ucfirst($item->status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 30px; color: #6c757d; font-style: italic;">
                                Data pendaftaran tidak ditemukan. Ubah kata kunci atau klik Reset Filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 15px;">
            {{ $registrations->links() }}
            <p style="font-size: 14px; color: #6c757d; margin-top: 5px;">
                Menampilkan {{ $registrations->count() }} dari {{ $registrations->total() }} data pendaftaran.
            </p>
        </div>
    </div>
</div>
@endsection