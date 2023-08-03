@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Catatan Bimbingan/Konseling</h1>
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
                            <h3 class="card-title">Data Bimbingan/Konseling</h3>
                            <div class="card-tools">
                                <a name="" id="" class="btn btn-sm btn-primary"
                                    href="{{ route('konselor/konseling/tambah') }}" role="button"><i
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
                                        <th>Nama Konselor</th>
                                        <th>Topik</th>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>isi catatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konseling as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->konselor->nama }}</td>
                                            <td>{{ $k->topik }}</td>
                                            <td>{{ $k->tanggal }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($k->konseling_siswas as $ks)
                                                        <li>
                                                            <a href="{{ route('profile/siswa', $ks->siswa->id) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                {{ $ks->siswa->nama }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $k->catatan }}</td>
                                            <td>
                                                <a name="" id="" class="btn btn-sm btn-default "
                                                    href="{{ route('konselor/konseling/ubah', $k) }}" role="button"><i
                                                        class="fas fa-pencil-alt "></i>
                                                    Ubah</a>

                                                <form action="{{ route('konselor/konseling/hapus', $k) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-default"
                                                        onclick="return confirm('Yakin akan menghapus data ini?')"><i
                                                            class="fas fa-trash-alt"></i>
                                                        Hapus</button>
                                                </form>
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
