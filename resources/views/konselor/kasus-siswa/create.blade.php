@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kasus Siswa</h1>
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
                        <form action="{{ route('konselor/kasus-siswa/simpan') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Kasus Siswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Kasus</label>
                                            <select class="form-control" name="kasus" id="kasus">
                                                @foreach ($kasus as $k)
                                                    <option value="{{ $k->id }}">
                                                        {{ $k->kategori . ' - ' . $k->bentuk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Siswa</label>
                                            <select class="form-control" name="siswa" id="siswa">
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->id }}">
                                                        {{ $s->nama . ' - ' . $s->kelas->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
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
