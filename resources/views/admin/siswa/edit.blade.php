@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Siswa</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('admin/siswa/perbarui', $siswa) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Siswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">NISN</label>
                                            <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                                name="nisn" id="nisn" placeholder="NISN"
                                                value="{{ old('nisn', $siswa->nisn) }}">
                                            @error('nisn')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Kelas</label>
                                            <select class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                                id="kelas">
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}"
                                                        {{ old('kelas', $siswa->kelas->id) == $k->id ? 'selected' : '' }}>
                                                        {{ $k->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kelas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" placeholder="Nama Lengkap"
                                                value="{{ old('nama', $siswa->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                                                placeholder="Alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir"
                                                value="{{ old('tgl_lahir', $siswa->tgl_lahir) }}">
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="Laki-Laki"
                                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '') }}>
                                                    Laki-Laki</option>
                                                <option
                                                    value="Perempuan"{{ old('jenis_kelamin', $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '') }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border p-2">
                                            <h5>Autentikasi</h5>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" id="username" aria-describedby="helpId"
                                                    placeholder="Username"
                                                    value="{{ old('username', $siswa->user->username) }}">
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password" aria-describedby="helpId"
                                                    placeholder="Password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary float-right"><i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
