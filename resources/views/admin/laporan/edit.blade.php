@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Laporan</h1>
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
                        <form action="{{ route('admin/laporan/perbarui', $laporan) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Form Ubah Laporan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Nama </label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    id="nama" placeholder="Nama"
                                                    value="{{ old('nama', $laporan->nama) }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">File</label>
                                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                                name="file" id="file" placeholder="File" value="{{ old('file') }}"
                                                accept="application/pdf">
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Tanggal Laporan</label>
                                            <input type="date"
                                                class="form-control @error('tgl_laporan') is-invalid @enderror"
                                                name="tgl_laporan" id="tgl_laporan" placeholder="Tanggal Laporan"
                                                value="{{ old('tgl_laporan', $laporan->tgl_laporan) }}">
                                            @error('tgl_laporan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
