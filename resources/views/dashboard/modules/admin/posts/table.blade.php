@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Berita Jamur</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center gutters-xs">
		<div class="col-md"><h2 class="section-title">Berita Jamur</h2></div>
		<div class="col-md-auto">
        	<a href="{{ route('dashboard.admin.posts.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Post</a>
        </div>
		<div class="col-md-auto">
        	<a href="{{ route('dashboard.admin.posts.create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Data Post</a>
        </div>
  </div>
@endsection

@section('content')
    
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-datatable" width="100%">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Slug</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Headline</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
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
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <script>

        let posts_ajax_url = '{{ route('dashboard.admin.ajax.posts') }}';
        console.log(posts_ajax_url);

        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                'dom': `<'row no-gutters'<'col-md'l><'col-md-auto'f><'col-md-auto'B>>
                        <'row'<'col-12't>>`,
                "pagingType": "numbers",
                "language": {
                    "lengthMenu": "Tampilkan _MENU_",
                    "zeroRecords": "Tidak Ada Data",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data Mitra:"
                },
                ajax: posts_ajax_url,
                preDrawCallback: () => {
                    $('#datatable').loader(true);
                },
                columns: [
                    {data: 'photo', name: 'photo'},
                    {data: 'slug', name: 'slug'},
                    {data: 'title', name: 'title'},
                    {data: 'body', name: 'body'},
                    {data: 'is_headline', name: 'is_headline'},
                    {
                        data: 'action', 
                        name: 'action',
                        createdCell: (cell, cellData, rowData, rowIndex, cellIndex) => {
                            $(cell).find('[data-toggle="delete"]').on('click', function(e) {
                                e.preventDefault();
                                const target_url = $(this).attr('href');
                                console.log(target_url);
                                Swal.fire({
                                    title: 'Hapus Data ?',
                                    text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Iya, Hapus!',
                                    cancelButtonText: 'Batal'
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = target_url;
                                    }
                                })
                            })
                        }
                    },
                ],
                drawCallback: () => {
                    $('#datatable').loader(false);
                },
                select: true
            });
            
        } );
    </script>
@endsection