@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Bimbingan/Konseling</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Jadwal</h3>
                            <div class="card-tools">
                                <a name="" id="" class="btn btn-sm btn-primary"
                                    href="{{ route('konselor/jadwal-bimbingan/tambah') }}" role="button"><i
                                        class="fas fa-plus"></i>
                                    Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bimbingan</th>
                                        <th>Tanggal Bimbingan</th>
                                        <th>Peserta</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalBimbingan as $jb)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jb->nama }}</td>
                                            <td>{{ $jb->tgl_bimbingan }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($jb->peserta_bimbingan as $pb)
                                                        <li>{{ $pb->siswa->nama }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                @if ($jb->peserta_bimbingan->count() < 1)
                                                    @if (date('Y-m-d', strtotime($jb->tgl_bimbingan)) > $date)
                                                        <form action="{{ route('siswa/peserta-bimbingan/simpan') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_jadwal_bimbingan"
                                                                value="{{ $jb->id }}">
                                                            <button type="submit" class="btn btn-sm btn-default"><i
                                                                    class="fas fa-check"></i>
                                                                Hadir</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
