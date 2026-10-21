<label>Pilih Poli:</label>
<select name="poli_id">
    <option value="">-- Pilih Poli --</option>
    @foreach ($polis as $poli)
        <option value="{{ $poli->id }}" @selected(old('poli_id', $doctor->poli_id ?? '') == $poli->id)>
            {{ $poli->name }}
        </option>
    @endforeach
</select>
@error('poli_id')
    <div style="color: red;">{{ $message }}</div>
@enderror