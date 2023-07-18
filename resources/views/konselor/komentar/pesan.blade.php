@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Detail</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects Detail</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 ">
                                <form action="{{ route('konselor/komentar-pesan/simpan', $pesan) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                            rows="4" placeholder="Balasan"></textarea>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-sm btn-primary float-right" type="submit"><i
                                            class="fab fa-telegram-plane"></i>
                                        Kirim</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Komentar Balasan</h4>
                                @foreach ($komentarPesan as $kp)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                                alt="user image">
                                            <span class="username">
                                                @if ($kp->user->level == 1)
                                                    <a href="#">{{ $kp->user->konselor->nama }}</a>
                                                @else
                                                    <a href="#">{{ $kp->user->siswa->nama }}</a>
                                                @endif
                                            </span>
                                            <span
                                                class="description">{{ \Carbon\Carbon::createFromDate($kp->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{ $kp->keterangan }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $pesan->subjek }}</h3>
                        <p class="text-muted">{{ $pesan->keterangan }}</p>
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
