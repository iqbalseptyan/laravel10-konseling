<li class="nav-item">
    <a href="{{ route('siswa/dashboard') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('siswa/konseling') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/konseling' ? 'active' : '' }}">
        <i class="nav-icon fas fa-paperclip"></i>
        <p>
            Catatan BK
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('siswa/kasus-siswa') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/kasus-siswa' ? 'active' : '' }}">
        <i class="nav-icon fas fa-pen"></i>
        <p>
            Kasus Siswa
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('siswa/jadwal-bimbingan') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/jadwal-bimbingan' ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
            Jadwal BK
        </p>
    </a>
</li>

<li class="nav-item ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-mail-bulk"></i>
        <p>
            Pesan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('siswa/pesan-masuk') }}"
                class="nav-link {{ Route::currentRouteName() == 'siswa/pesan-masuk' ? 'active' : '' }}">
                <i class="fas fa-inbox nav-icon"></i>
                <p>Masuk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('siswa/pesan-keluar') }}"
                class="nav-link {{ Route::currentRouteName() == 'siswa/pesan-keluar' ? 'active' : '' }}">
                <i class="fab fa-telegram-plane nav-icon"></i>
                <p>Keluar</p>
            </a>
        </li>
    </ul>
</li>
