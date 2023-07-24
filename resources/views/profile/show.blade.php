@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ $user->foto == 'default.png' ? '../../dist/img/default-150x150.png' : asset('storage/' . $user->foto) }}"
                                    alt="user">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->siswa->nama }}</h3>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Kasus</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{ session('error') }}
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="tab-content">

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('profile/password') }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row">
                                            <label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('password_lama') is-invalid @enderror"
                                                    id="password_lama" placeholder="Password Lama" name="password_lama">
                                                @error('password_lama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_baru" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('password_baru') is-invalid @enderror"
                                                    id="password_baru" placeholder="Password Baru" name="password_baru">
                                                @error('password_baru')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirmPassword" class="col-sm-2 col-form-label">Konfirmasi
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('konfirmasi_password') is-invalid @enderror"
                                                    id="konfirmasi_password" placeholder="Konfirmasi Password"
                                                    name="konfirmasi_password">
                                                @error('konfirmasi_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form action="{{ route('profile/foto') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file"
                                                    class="form-control @error('foto') is-invalid @enderror" id="foto"
                                                    placeholder="foto" name="foto" accept="image/*">
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
