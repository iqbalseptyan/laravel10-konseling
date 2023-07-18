@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Catatan Kasus</h1>
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
                        <form action="{{ route('konselor/kasus/perbarui', $kasus) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Kasus</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Kategori Kasus</label>
                                            <input type="text"
                                                class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                                id="kategori" placeholder="Kategori"
                                                value="{{ old('kategori', $kasus->kategori) }}">
                                            @error('kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Bentuk Kasus</label>
                                            <input type="text" class="form-control @error('bentuk') is-invalid @enderror"
                                                name="bentuk" id="bentuk" placeholder="Bentuk Kasus"
                                                value="{{ old('bentuk', $kasus->bentuk) }}">
                                            @error('bentuk')
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
