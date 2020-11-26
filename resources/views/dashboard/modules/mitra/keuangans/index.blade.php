@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')
@section('header', 'Keuangan')

@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Tabel Data Keuangan Bulanan</h2></div>
        <div class="col-md-auto"><a href="{{ route('dashboard.mitra.keuangans.analysis') }}" class="btn btn-primary"><i class="fas fa-chart-line mr-2"></i>Analisis Pendapatan</a></div>
  </div>
@endsection

@section('content')

    {{-- widget --}}
    <div class="row">
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                	<i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Total Data Keuangan Bulanan</h4>
					</div>
					<div class="card-body">
						8
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                	<i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Total Pemasukan</h4>
					</div>
					<div class="card-body">
						20
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                	<i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Total Pengeluaran</h4>
					</div>
					<div class="card-body">
						20
					</div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of widget --}}
    
    {{-- Export --}}
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md">Export Data</div>
                <div class="col-md-auto" id="col-export-table"></div>
            </div>
        </div>
    </div>

    {{-- Datatable --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td class="align-middle">
                                <div class="table-img"><img src="{{ asset('img/users/2.jpg') }}" alt=""></div>
                            </td>
                            <td>chealseolivierelizaberth@gmail.com</td>
                            <td>Chelsea Olivier</td>
                            <td>20</td>
                            <td><span class="badge badge-success">Aktif</span></td>
                            <td>
                                <a href="{{ url('ui/unitkerja/show') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="{{ url('ui/dashboard/admin/users/edit') }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('ui/dashboard/admin/users/show') }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endfor --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
    <style>
        .dataTables_wrapper .dataTables_length .custom-select {
            padding-right: 45px !important;
        }
        .dataTables_wrapper .select-info {
            margin-left: 10px;
            color: rgb(255, 115, 0);
            font-weight: bold;
        }
        .dataTables_wrapper tr.selected {
            background-color: rgba(63, 63, 63, 0.09);
        }
        .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
            margin-left: 20px;
        }
        .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
            display: flex;
            align-items: center;
        }
        @media screen and (max-width: 768px) {
            .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
                margin-left: 0;
            }
            .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
@endsection

@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script> --}}
    <script src="{{ asset('vendors/datatable/datatable.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>
    
    <script>
        let productions_ajax_url = '{{ route('dashboard.mitra.ajax.getKeuanganBulanans') }}';

        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                // serverSide: true,
                processing: true,
                "lengthMenu": [ 12, 24, 32, 64 ],
                'dom': `<'row no-gutters'<'col-md'l><'col-md-auto'f><'col-md-auto'B>>
                        <'row'<'col-12't>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-table mr-2"></i>Pilih Kolom',
                        className: 'btn-primary',
                        prefixButtons: [ 
                            {
                                extend: 'colvisRestore',
                                text: 'Tampilkan Semua Kolom'
                            }
                        ]
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel mr-2"></i>Export Excel',
                        className: 'btn-success',
                        title: 'Test Data export',
                        exportOptions: {
                            columns: ":visible"
                        }
                    }, 
                ],
                // "ordering" : false,
                "aaSorting" : [],
                "pagingType": "numbers",
                "language": {
                    "lengthMenu": "Tampilkan _MENU_",
                    "zeroRecords": "Tidak Ada Data",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data Mitra:"
                },
                ajax: productions_ajax_url,
                preDrawCallback: () => {
                    $('#datatable').loader(true);
                },
                columns: [
                    {data: 'month', name: 'month'},
                    {data: 'pemasukan', name: 'pemasukan'},
                    {data: 'pengeluaran', name: 'pengeluaran'},
                ],
                drawCallback: () => {
                    $('#datatable').loader(false);
                },
                select: true
            });
            table.buttons().container().appendTo('#col-export-table');
            
        } );
    </script>
@endsection