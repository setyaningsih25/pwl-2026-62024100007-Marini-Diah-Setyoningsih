<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>@yield('title', 'Sistem Informasi Klinik')</title>
</head>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<body>
 <header>
 <h2>Sistem Informasi Klinik</h2>
 </header>
 <nav>
 <a href="{{ route('dashboard') }}">Dashboard</a>
 <a href="{{ route('pasien.index') }}">Pasien</a>
 <a href="{{ route('dokter.index') }}">Dokter</a>
 <a href="{{ route('poli.index') }}">Poli</a>
 </nav>
 <main>
 @yield('content')
 </main>
 <footer>
 <p>Pemrograman Web Lanjut</p>
 </footer>
</body>
 @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
