<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        <!-- Horizontal Form -->
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Bagian</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('bagian.store') }}">
                @csrf

                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

                <div class="card-body">



                    <div class="row">
                        <div class="col-md-12">




                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        placeholder="Kode Bagian" name="kode" id="kode"
                                        value="{{ old('kode') }}">

                                    @error('kode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}"
                                autocomplete="email" placeholder="Email"> --}}



                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bagian</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('nama_bagian') is-invalid @enderror" id="nama_bagian"
                                        name="nama_bagian" value="{{ old('nama_bagian') }}" placeholder="Nama Bagian">

                                    @error('nama_bagian')
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
