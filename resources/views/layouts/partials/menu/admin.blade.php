<li class="nav-item">
    <a href="{{ route($route . 'dashboard') }}"
        class="nav-link {{ Route::currentRouteName() == $route . 'dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item menu-open">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-database"></i>
        <p>
            Master Data
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route($route . 'kelas') }}"
                class="nav-link {{ Route::currentRouteName() == $route . 'kelas' ? 'active' : '' }}">
                <i class="fas fa-home nav-icon"></i>
                <p>Kelas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route($route . 'siswa') }}"
                class="nav-link {{ Route::currentRouteName() == $route . 'siswa' ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>Siswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route($route . 'konselor') }}"
                class="nav-link {{ Route::currentRouteName() == $route . 'konselor' ? 'active' : '' }}">
                <i class="fas fa-user-tie nav-icon"></i>
                <p>Konselor</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('admin/laporan') }}"
        class="nav-link {{ Route::currentRouteName() == 'admin/laporan' ? 'active' : '' }}">
        <i class="nav-icon fas fa-sticky-note"></i>
        <p>
            Laporan
        </p>
    </a>
</li>
