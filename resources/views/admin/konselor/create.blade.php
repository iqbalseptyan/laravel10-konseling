@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Konselor</h1>
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
                        <form action="{{ route('admin/konselor/simpan') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Konselor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Nama Konselor</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" aria-describedby="helpId" placeholder="">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border p-2">
                                            <h5>Authentication</h5>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                                    name="username" id="username" aria-describedby="helpId" placeholder="Username">
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password" aria-describedby="helpId" placeholder="Password">
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
