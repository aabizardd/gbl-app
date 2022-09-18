@extends('layouts.main')

@section('addStyle')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

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

                @if (Auth::user()->level == 3 || Auth::user()->level == 4)
                    @include('jabatan.add_jabatan')
                @endif
                <!-- /.row -->

                {{-- //disini data table --}}
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card mt-2">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Nama Jabatan</th>

                                                    @if (Auth::user()->level == 4)
                                                        <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $no = 1;
                                                @endphp

                                                @foreach ($jabatans as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->kode }}</td>
                                                        <td>{{ $item->nama_jabatan }}</td>

                                                        @if (Auth::user()->level == 4)
                                                            <td width=200>
                                                                <button type="button" class="btn btn-warning edit-data"
                                                                    data-toggle="modal" data-target="#modal-default"
                                                                    data-id="{{ $item->id }}"
                                                                    data-kode="{{ $item->kode }}"
                                                                    data-nama="{{ $item->nama_jabatan }}">
                                                                    <span class="fas fa-pen"></span>
                                                                    Edit
                                                                </button>

                                                                <a href="{{ route('jabatan.delete', ['id' => $item->id]) }}"
                                                                    class="btn btn-danger">
                                                                    <span class="fas fa-trash"></span>
                                                                    Hapus
                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach



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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('jabatan.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" id="jabatan_id" name="jabatan_id" value="">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode</label>
                            <input type="text" class="form-control @error('kode_update') is-invalid @enderror"
                                id="kode_update" name="kode_update" placeholder="Kode jabatan"
                                value="{{ old('kode_update') }}">

                            @error('kode_update')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <span class="text-danger">
                                <strong>Hey</strong>
                            </span> --}}


                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan_update') is-invalid @enderror"
                                id="nama_jabatan_update" name="nama_jabatan_update" placeholder="Nama jabatan"
                                value="{{ old('nama_jabatan_update') }}">

                            @error('nama_jabatan_update')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('addScript')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>


    @error('nama_jabatan_update')
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modal-default').modal('show');
            });
        </script>
    @enderror

    @error('kode_update')
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modal-default').modal('show');
            });
        </script>
    @enderror

    <script>
        $(document).on("click", ".edit-data", function() {
            // alert('hai')
            var id = $(this).data('id');
            var kode = $(this).data('kode');
            var nama = $(this).data('nama');

            $(".modal-body #jabatan_id").val(id);
            $(".modal-body #kode_update").val(kode);
            $(".modal-body #nama_jabatan_update").val(nama);

        });
    </script>
@endsection
