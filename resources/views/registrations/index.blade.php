<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pendaftaran Pasien</title>
</head>
<body>
    <h1>Daftar Pendaftaran Pasien</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- --- LETAKKAN KODE TERSEBUT DI DALAM SINI --- -->
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $registration->registration_date }}</td>
                    <td>{{ $registration->patient->name }}</td>
                    <td>{{ $registration->doctor->name }}</td>
                    <td>{{ $registration->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>