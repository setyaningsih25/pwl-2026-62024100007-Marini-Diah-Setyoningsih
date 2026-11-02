<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Informasi Klinik')</title>

    {{-- AdminLTE 4 + Bootstrap Icons (via CDN, butuh koneksi internet) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    {{-- Header --}}
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Sidebar kiri dengan icon (partials/sidebar.blade.php) --}}
    @include('partials.sidebar')

    {{-- Konten --}}
    <main class="app-main">
        @hasSection('title')
            <div class="app-content-header">
                <div class="container-fluid">
                    <h3 class="mb-0">@yield('title')</h3>
                </div>
            </div>
        @endif

        <div class="app-content">
            <div class="container-fluid">
                {{-- Pesan sukses ditampilkan oleh masing-masing halaman index --}}
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="app-footer">
        <strong>Copyright &copy; 2026 Sistem Informasi Klinik.</strong>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>
</body>
</html>