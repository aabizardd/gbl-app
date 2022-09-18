<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        <!-- Horizontal Form -->
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Form Permohonan Cuti</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('cuti.store') }}">
                @csrf




                <div class="card-body">



                    <div class="row">
                        <div class="col-md-6">

                            @if (Auth::user()->level == 1)
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @else
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Karyawan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control @error('user_id') is-invalid @enderror"
                                            name="user_id" id="user_id">

                                            <option value="" disabled selected>Pilih karyawan</option>
                                            @foreach ($karyawans as $karyawan)
                                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <input type="text" class="form-control" placeholder="Bagian"> --}}
                                    </div>
                                </div>
                            @endif




                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Dari
                                    Tanggal</label>

                                <div class="col-sm-10">
                                    <input type="date"
                                        class="form-control @error('dari_tanggal') is-invalid @enderror"
                                        placeholder="Dari Tanggal" name="dari_tanggal" id="dari_tanggal"
                                        value="{{ old('dari_tanggal') }}">

                                    @error('dari_tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sampai
                                    Tanggal</label>

                                <div class="col-sm-10">
                                    <input type="date"
                                        class="form-control @error('sampai_tanggal') is-invalid @enderror"
                                        id="sampai_tanggal" name="sampai_tanggal" value="{{ old('sampai_tanggal') }}">

                                    @error('sampai_tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Bagian</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('bagian_id') is-invalid @enderror"
                                        name="bagian_id" id="bagian_id">

                                        <option value="" disabled selected>Pilih bagian</option>
                                        @foreach ($bagians as $bagian)
                                            <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bagian_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input type="text" class="form-control" placeholder="Bagian"> --}}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">



                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                        name="jabatan_id" id="jabatan_id">

                                        <option value="" disabled selected>Pilih jabatan</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">
                                                {{ $jabatan->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                        name="keterangan" id="keterangan" placeholder="Keterangan">

                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                        </div>
                    </div>

                    @if (Auth::user()->level == 1)
                        @php
                            $total_cuti = 12;
                        @endphp

                        <div class="text-center mt-3">
                            <h5>Data Cuti - Sisa Cuti Anda Sebanyak {{ $total_cuti - $jml_cuti }} Hari</h5>
                        </div>
                    @endif



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
