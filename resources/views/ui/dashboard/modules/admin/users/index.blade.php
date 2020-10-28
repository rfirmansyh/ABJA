@extends('ui.dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Mitra Aplikasi ABJA')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Mitra</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Daftar Mitra</h2></div>
		<div class="col-md-auto">
        	<a href="{{ url('ui/dashboard/admin/users/create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Mitra Manual</a>
        </div>
  </div>
@endsection

@section('content')

    {{-- widget --}}
    <div class="row">
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                	<i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Mitra Baru</h4>
					</div>
					<div class="card-body">
						8
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                	<i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Total Mitra</h4>
					</div>
					<div class="card-body">
						20
					</div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of widget --}}
    
    {{-- Table --}}
    <div class="card">
        <div class="card-header justify-content-between align-items-center">
            <h4>Daftar Mitra</h4>
            <button data-toggle="collapse" data-target="#collapseExample" class="btn btn-sm btn-outline-primary py-1 px-3"><i class="fas fa-filter"></i></button>
        </div>
        <div class="card-body py-0">
            <div class="collapse" id="collapseExample">
                <div class="row align-items-end gutters-xs border-bottom py-4 mb-3"> 
                    <div class="col-md">
                        <div class="form-group mb-3 mb-md-0">
                            <label for="">Pilih Status</label>
                            <select class="custom-select">
                                <option selected>Semua</option>
                                <option value="1">Aktif</option>
                                <option value="2">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-3 mb-md-0">
                            <label for="">Pilih Lokasi Kota</label>
                            <select class="custom-select">
                                <option selected>Semua</option>
                                <option value="1">Jember</option>
                                <option value="2">Lumajang</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-3 mb-md-0">
                            <label for="">Luas</label>
                            <select class="custom-select">
                                <option selected>Semua</option>
                                <option value="1">> 10 M2</option>
                                <option value="2">Lumajang</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group mb-3 mb-md-0">
                            <label for="">Tanggal Buat</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 d-none d-md-block mb-3"></div>
                    <div class="col-md">
                        <div class="form-group mb-md-0">
                            <label for="">Nama Tempat</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Untuk Dicari">
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-block btn-lg btn-outline-primary">Proses Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Budidaya</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
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
                        <a href="{{ url('ui/unitkerja/show') }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
            </nav>
        </div>
    </div>
    
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <style>

    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endsection