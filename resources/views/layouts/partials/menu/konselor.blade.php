<li class="nav-item">
    <a href="{{ route('konselor/dashboard') }}"
        class="nav-link {{ Route::currentRouteName() == 'konselor/dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('konselor/kasus') }}"
        class="nav-link {{ Route::currentRouteName() == 'konselor/kasus' ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            Catatan Kasus
        </p>
    </a>
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
<li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-mail-bulk"></i>
        <p>
            Pesan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="./index.html" class="nav-link ">
                <i class="fas fa-inbox nav-icon"></i>
                <p>Masuk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('konselor/pesan-keluar') }}"
                class="nav-link {{ Route::currentRouteName() == 'konselor/pesan-keluar' ? 'active' : '' }}">
                <i class="fab fa-telegram-plane nav-icon"></i>
                <p>Keluar</p>
            </a>
        </li>
    </ul>
</li>
