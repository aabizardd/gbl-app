@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <a href="{{ route('user') }}" class="btn btn-danger mt-2">
                    <span class="fas fa-arrow-left"></span>
                    Kembali
                </a>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Pemberitahuan!</h5>
                        {{ $message }}
                    </div>
                @endif

                {{-- @if (Auth::user()->level == 1)
                    @include('cuti.add_cuti')
                @endif --}}
                <!-- /.row -->

                {{-- //disini data table --}}
                <div class="row">
                    <div class="col-md-12 col-12">



                        <div class="card mt-2">
                            <form action="{{ route('user.update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <h4 class="text-center">Form Edit Data User</h4>


                                    <div class="container-fluid mt-5">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    placeholder="NIK" name="nik" id="nik"
                                                    value="{{ $user->nik }}">

                                                @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                    id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}"
                                                    placeholder="Nama Lengkap">

                                                @error('nama_lengkap')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" value="{{ $user->username }}"
                                                    placeholder="Username">

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ $user->email }}" placeholder="Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Level</label>

                                            <div class="col-sm-10">
                                                @php
                                                    $role = '';
                                                    
                                                    if ($user->level == 1) {
                                                        $role = 'Karyawan';
                                                    } elseif ($user->level == 2) {
                                                        $role = 'HRD';
                                                    } elseif ($user->level == 3) {
                                                        $role = 'Asman OPS';
                                                    } else {
                                                        $role = 'Admin';
                                                    }
                                                @endphp
                                                <input type="hidden" name="level" value="{{ $user->level }}">
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $role }}">
                                            </div>

                                        </div>

                                        <input type="hidden" name="password_old" value="{{ $user->password }}">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>

                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" value="{{ $user->password }}"
                                                    placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>


                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
