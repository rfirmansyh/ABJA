@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Produksi Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Kebutuhan Saya</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Data Kebutuhan Produksi Saya</h2></div>
		<div class="col-md-auto">
        	<a href="{{ route('dashboard.mitra.kebutuhantypes.create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Jenis Kebutuhan</a>
        </div>
  </div>
@endsection

@section('content')

    {{-- if widget added --}}
    {{-- end of if widget added --}}

    {{-- filter --}}
    <div class="card card-primary">
        <div class="card-body">
            {{--  --}}
            <div class="card-title d-flex justify-content-between">
                <h2 class="tx-24 font-weight-bolder">Filter</h2>
                <button data-toggle="collapse" data-target="#collapseExample" class="btn btn-sm btn-outline-primary py-0 px-3"><i class="fas fa-filter"></i></button>
            </div>
            <hr>
            <div class="collapse" id="collapseExample">
                <div class="row align-items-end gutters-xs border-bottom pb-4 mb-5"> 
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

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kebutuhan</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($kebutuhanTypes as $kebutuhanType)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td width="300px">{{ $kebutuhanType->name }}</td>
                            <td >{{ $kebutuhanType->unit }}</td>
                            <td >{{ $kebutuhanType->description }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('dashboard.mitra.kebutuhantypes.edit', $kebutuhanType->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
            </table>
            
            <div class="row justify-content-center justify-content-md-end">
                <div class="col-auto">{{$kebutuhanTypes->appends(Request::all())->links()}}</div>
            </div>
        </div>
    </div>
    {{-- end of filter --}}

    
@endsection

@section('style')
@endsection

@section('script')
@endsection