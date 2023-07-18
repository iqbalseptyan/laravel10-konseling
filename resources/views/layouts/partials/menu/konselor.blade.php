<li class="nav-item">
    <a href="{{ route('konselor/dashboard') }}"
        class="nav-link {{ Route::currentRouteName() == 'konselor/dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item ">
    <a href="#" class="nav-link {{ Route::currentRouteName() == 'konselor/kasus' ? 'active' : '' }}">
        <i class="nav-icon fas fa-database"></i>
        <p>
            Master Data
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('konselor/kasus') }}"
                class="nav-link {{ Route::currentRouteName() == 'konselor/kasus' ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Bentuk Kasus
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('konselor/kasus-siswa') }}"
        class="nav-link {{ Route::currentRouteName() == 'konselor/kasus-siswa' ? 'active' : '' }}">
        <i class="nav-icon fas fa-pen"></i>
        <p>
            Input Kasus
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('konselor/jadwal-bimbingan') }}"
        class="nav-link {{ Route::currentRouteName() == 'konselor/jadwal-bimbingan' ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
            Jadwal Bimbingan
        </p>
    </a>
</li>
