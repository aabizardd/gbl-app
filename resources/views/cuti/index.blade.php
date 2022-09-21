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

                @if (Auth::user()->level == 1 || Auth::user()->level == 4)
                    @include('cuti.add_cuti')
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
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Tanggal</th>
                                                    <th>Dari Tanggal</th>
                                                    <th>Sampai Tanggal</th>
                                                    <th>Total Hari</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    @if (Auth::user()->level == 2 || Auth::user()->level == 4)
                                                        <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($cutis as $cuti)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $cuti->nik }}</td>
                                                        <td>{{ $cuti->nama_lengkap }}</td>
                                                        <td>{{ $cuti->tanggal }}</td>
                                                        <td>{{ $cuti->dari_tanggal }}</td>
                                                        <td>{{ $cuti->sampai_tanggal }}</td>
                                                        <td>{{ $cuti->total_hari }} Hari</td>
                                                        <td>{{ $cuti->keterangan }}</td>
                                                        <td>
                                                            @if ($cuti->status == 0)
                                                                Pending
                                                            @elseif($cuti->status == 1)
                                                                Approve
                                                            @elseif($cuti->status == 2)
                                                                Decline
                                                            @else
                                                                Selesai Cuti
                                                            @endif
                                                        </td>
                                                        @if (Auth::user()->level == 2)
                                                            <td width="200">
                                                                <center>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-info">Pilih
                                                                            Aksi</button>
                                                                        <button type="button"
                                                                            class="btn btn-info dropdown-toggle dropdown-icon"
                                                                            data-toggle="dropdown">
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>

                                                                        <div class="dropdown-menu" role="menu">
                                                                            <a class="dropdown-item bg-primary mb-1"
                                                                                href="{{ route('cuti.update', ['id' => $cuti->id, 'status' => 1]) }}">
                                                                                <span class="fas fa-check"></span>
                                                                                Approve
                                                                            </a>

                                                                            <a class="dropdown-item bg-danger mb-1"
                                                                                href="{{ route('cuti.update', ['id' => $cuti->id, 'status' => 2]) }}">
                                                                                <span class="fas fa-ban"></span>
                                                                                Decline
                                                                            </a>

                                                                            @if ($cuti->status == 1)
                                                                                <a class="dropdown-item bg-primary mb-1"
                                                                                    href="{{ route('cuti.update', ['id' => $cuti->id, 'status' => 3]) }}">
                                                                                    <span class="fas fa-check"></span>
                                                                                    Selesai Cuti
                                                                                </a>
                                                                            @endif


                                                                            <a class="dropdown-item bg-danger mb-1"
                                                                                href="{{ route('cuti.delete', ['id' => $cuti->id]) }}">
                                                                                <span class="fas fa-trash"></span>
                                                                                Hapus
                                                                            </a>

                                                                        </div>
                                                                    </div>
                                                                </center>

                                                                {{-- <a href="{{ route('cuti.update', ['id' => $cuti->id, 'status' => 1]) }}"
                                                                    class="btn btn-success">
                                                                    <span class="fas fa-check"></span>
                                                                    Approve
                                                                </a>
                                                                <a href="{{ route('cuti.update', ['id' => $cuti->id, 'status' => 2]) }}"
                                                                    class="btn btn-danger">
                                                                    <span class="fas fa-ban"></span>
                                                                    Decline
                                                                </a>

                                                                <a href="{{ route('cuti.delete', ['id' => $cuti->id]) }}"
                                                                    class="btn btn-danger"><span
                                                                        class="fas fa-trash"></span>
                                                                    Hapus</a> --}}
                                                            </td>
                                                        @elseif(Auth::user()->level == 4)
                                                            <td>
                                                                <a class="btn btn-danger mb-1"
                                                                    href="{{ route('cuti.delete', ['id' => $cuti->id]) }}">
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
                @if (Auth::user()->level == 2)
                    'buttons': [{
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        }
                    ],
                @endif

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
@endsection
