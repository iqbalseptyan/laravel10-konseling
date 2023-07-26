@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kasus Siswa</h1>
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
                            <h3 class="card-title">Data Kasus</h3>
                            <div class="card-tools">
                                <a name="" id="" class="btn btn-sm btn-primary"
                                    href="{{ route('konselor/kasus-siswa/tambah') }}" role="button"><i
                                        class="fas fa-plus"></i>
                                    Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="datatableKasus" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Kasus</th>
                                        <th>Bentuk Kasus</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kasusSiswa as $ks)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ks->kasus->kategori }}</td>
                                            <td>{{ $ks->kasus->bentuk }}</td>
                                            <td>
                                                <a href="{{ route('profile/siswa', $ks->siswa->id) }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $ks->siswa->nama }}</a>
                                            </td>
                                            <td>{{ $ks->siswa->kelas->nama }}</td>
                                            <td>
                                                <a name="" id="" class="btn btn-sm btn-default "
                                                    href="{{ route('konselor/kasus-siswa/ubah', $ks) }}" role="button"><i
                                                        class="fas fa-pencil-alt "></i>
                                                    Ubah</a>

                                                <form action="{{ route('konselor/kasus-siswa/hapus', $ks) }}"
                                                    method="post">
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
