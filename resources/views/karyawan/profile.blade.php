@extends('layouts.main')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Pemberitahuan!</h5>
                        {{ $message }}
                    </div>
                @endif


                <!-- /.row -->

                {{-- //disini data table --}}
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card mt-2">
                            <!-- /.card-header -->
                            <div class="card-body px-5">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">

                                        <h4 class="text-center mb-3">Data Diri Anda</h5>

                                            <table id="example1" class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->nik }}</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->nama_lengkap }}</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Tempat, Tanggal Lahir</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->tempat_lahir }}, {{ $data_diri->tanggal_lahir }}
                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>Agama</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->agama }}</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->jenis_kelamin }}</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Bagian</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->nama_bagian }}</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td width=10>:</td>
                                                        <td>{{ $data_diri->nama_jabatan }}</td>


                                                    </tr>


                                                </thead>
                                                <tbody>


                                                </tbody>

                                            </table>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
