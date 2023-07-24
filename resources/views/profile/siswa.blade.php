@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ $siswa->user->foto == 'default.png' ? '../../dist/img/default-150x150.png' : asset('storage/' . $user->foto) }}"
                                    alt="user">
                            </div>

                            <h3 class="profile-username text-center">{{ $siswa->nama }}</h3>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right">{{ $siswa->kelas->nama }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <a class="float-right">{{ $siswa->jenis_kelamin }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Kasus</b> <a class="float-right">{{ $kasus->count() }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Catatan
                                        Kasus</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            <div class="tab-content">
                                <div class="tab-pane active table-responsive" id="settings">
                                    <table class="table table-striped table-inverse " id="datatable">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori Kasus</th>
                                                <th>Bentuk Kasus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kasus as $k)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $k->kasus->kategori }}</td>
                                                    <td>{{ $k->kasus->bentuk }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
