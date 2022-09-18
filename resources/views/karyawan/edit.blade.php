@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <a href="{{ route('karyawan') }}" class="btn btn-danger mt-2">
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
                            <form action="{{ route('karyawan.update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <h4 class="text-center">Form Edit Data Karyawan</h4>


                                    <div class="container-fluid mt-5">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIK</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    placeholder="NIK" name="nik" id="nik"
                                                    value="{{ $karyawan->nik }}">

                                                @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                    placeholder="Nama Lengkap" name="nama_lengkap" id="nama_lengkap"
                                                    value="{{ $karyawan->nama_lengkap }}">

                                                @error('nama_lengkap')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir"
                                                    value="{{ $karyawan->tempat_lahir }}">

                                                @error('tempat_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>

                                            <div class="col-sm-10">
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    placeholder="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir"
                                                    value="{{ $karyawan->tanggal_lahir }}">

                                                @error('tanggal_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Agama</label>

                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('agama') is-invalid @enderror"
                                                    placeholder="Agama" name="agama" id="agama"
                                                    value="{{ $karyawan->agama }}">

                                                @error('agama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>

                                            <div class="col-sm-10">

                                                <select type="text"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    placeholder="Jenis Kelamin" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        @php echo $karyawan->jenis_kelamin == "Laki-laki" ? 'selected' : '' @endphp>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        @php echo $karyawan->jenis_kelamin == "Perempuan" ? 'selected' : '' @endphp>
                                                        Perempuan</option>
                                                </select>
                                                {{-- <input type="text"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    placeholder="Jenis Kelamin" name="jenis_kelamin" id="jenis_kelamin"
                                                    value="{{ $karyawan->jenis_kelamin }}"> --}}

                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bagian</label>

                                            <div class="col-sm-10">

                                                <select type="text"
                                                    class="form-control @error('bagian') is-invalid @enderror"
                                                    placeholder="Bagian" name="bagian" id="bagian">
                                                    <option value="" selected disabled>Pilih Bagian</option>

                                                    @foreach ($bagians as $item)
                                                        <option value="{{ $item->id }}"
                                                            @php echo $karyawan->bagian_id == $item->id ? 'selected' : '' @endphp>
                                                            {{ $item->nama_bagian }}</option>
                                                    @endforeach
                                                    {{-- <option value="Laki-laki"
                                                        @php echo $karyawan->bagian == "Laki-laki" ? 'selected' : '' @endphp>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        @php echo $karyawan->bagian == "Perempuan" ? 'selected' : '' @endphp>
                                                        Perempuan</option> --}}

                                                </select>


                                                @error('bagian')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jabatan</label>

                                            <div class="col-sm-10">

                                                <select type="text"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    name="jabatan" id="jabatan">
                                                    <option value="" selected disabled>Pilih Jabatan</option>

                                                    @foreach ($jabatans as $item)
                                                        <option value="{{ $item->id }}"
                                                            @php echo $karyawan->jabatan_id == $item->id ? 'selected' : '' @endphp>
                                                            {{ $item->nama_jabatan }}</option>
                                                    @endforeach
                                                    {{-- <option value="Laki-laki"
                                                        @php echo $karyawan->jabatan == "Laki-laki" ? 'selected' : '' @endphp>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        @php echo $karyawan->jabatan == "Perempuan" ? 'selected' : '' @endphp>
                                                        Perempuan</option> --}}

                                                </select>


                                                @error('jabatan')
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
