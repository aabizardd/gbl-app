<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        <!-- Horizontal Form -->
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                @csrf

                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

                <div class="card-body">



                    <div class="row">
                        <div class="col-md-12">




                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        placeholder="NIK" name="nik" id="nik" value="{{ old('nik') }}">

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
                                        id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
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
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username') }}"
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
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" placeholder="Email">

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

                                    <select class="form-control @error('level') is-invalid @enderror" id="level"
                                        name="level">
                                        <option value="" selected disabled>Pilih Level</option>
                                        @php
                                            $id = 1;
                                        @endphp
                                        @foreach ($levels as $item)
                                            <option value="{{ $id++ }}">{{ $item }}</option>
                                        @endforeach

                                    </select>
                                    {{-- <input type="text" class="form-control @error('level') is-invalid @enderror"
                                        id="level" name="level" value="{{ old('level') }}" placeholder="level"> --}}

                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password') }}"
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


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

    </div>
    <!--/.col (left) -->

</div>
