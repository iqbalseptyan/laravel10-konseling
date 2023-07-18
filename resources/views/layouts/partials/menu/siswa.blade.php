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
    <a href="{{ route('siswa/kasus-siswa') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/kasus-siswa' ? 'active' : '' }}">
        <i class="nav-icon fas fa-pen"></i>
        <p>
            Catatan Kasus
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('siswa/jadwal-bimbingan') }}"
        class="nav-link {{ Route::currentRouteName() == 'siswa/jadwal-bimbingan' ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
            Jadwal Bimbingan
        </p>
    </a>
</li>
