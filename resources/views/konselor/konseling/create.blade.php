@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Catatan Bimbingan/Konseling</h1>
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
                        <form action="{{ route('konselor/konseling/simpan') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Konseling</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Nama Siswa</label>
                                                <select
                                                    class="form-control selectpicker @error('nama_siswa') is-invalid @enderror"
                                                    name="nama_siswa[]" id="nama_siswa" multiple data-live-search="true">
                                                    @foreach ($siswa as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ $s->nama . ' - ' . $s->kelas->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nama_siswa')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <input type="datetime-local"
                                                class="form-control @error('tgl_konseling') is-invalid @enderror"
                                                name="tgl_konseling" id="tgl_konseling" placeholder="Tanggal"
                                                value="{{ old('tgl_konseling') }}">
                                            @error('tgl_konseling')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Topik</label>
                                            <input type="text"
                                                class="form-control @error('topik_konseling') is-invalid @enderror"
                                                name="topik_konseling" id="topik_konseling" placeholder="Topik"
                                                value="{{ old('topik_konseling') }}">
                                            @error('topik_konseling')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Catatan</label>
                                            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" rows="4"
                                                placeholder="Catatan">{{ old('catatan') }}</textarea>
                                            @error('catatan')
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
