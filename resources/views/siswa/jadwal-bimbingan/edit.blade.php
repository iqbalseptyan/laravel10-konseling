@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Jadwal Bimbingan</h1>
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
                        <form action="{{ route('konselor/jadwal-bimbingan/perbarui', $jadwalBimbingan) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Jadwal Bimbingan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nama Bimbingan</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" placeholder="Nama Bimbingan"
                                                value="{{ old('nama', $jadwalBimbingan->nama) }}">
                                        </div>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Bimbingan</label>
                                            <input type="datetime-local"
                                                class="form-control @error('tgl_bimbingan') is-invalid @enderror"
                                                name="tgl_bimbingan" id="tgl_bimbingan" placeholder="Tanggal Bimbingan"
                                                value="{{ old('tgl_bimbingan', $jadwalBimbingan->tgl_bimbingan) }}">
                                        </div>
                                        @error('tgl_bimbingan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
