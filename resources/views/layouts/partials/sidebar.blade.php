<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="{{ url('') }}/dist/img/logo ytck.png" alt="YTCK Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">BK ALCENT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                @if (Auth::user()->level == 0)
                    @include('layouts.partials.menu.admin')
                @elseif(Auth::user()->level == 1)
                    @include('layouts.partials.menu.konselor')
                @else
                    @include('layouts.partials.menu.siswa')
                @endif

                <li class="nav-item">
                    <a href="{{ route('profile') }}"
                        class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth/logout') }}" class="nav-link ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
