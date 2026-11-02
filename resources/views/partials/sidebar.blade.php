<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <i class="bi bi-hospital-fill fs-4 ms-1 me-2"></i>
            <span class="brand-text fw-light">Sistem Informasi Klinik</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien.index') }}"
                       class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.index') }}"
                       class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Dokter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('poli.index') }}"
                       class="nav-link {{ request()->routeIs('poli.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-hospital"></i>
                        <p>Poli</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('registrations.index') }}"
                       class="nav-link {{ request()->routeIs('registrations.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-clipboard-check"></i>
                        <p>Pendaftaran</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>