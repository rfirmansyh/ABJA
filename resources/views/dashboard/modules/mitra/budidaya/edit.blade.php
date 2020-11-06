@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tambah Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Tempat Budidaya</a></div>
    <div class="breadcrumb-item">Ubah Tempat Budidaya</div>
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Form Ubah Tempat Budidaya</h2></div>
        <div class="col-md-auto">
            <a href="{{ route('dashboard.mitra.budidaya.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Budidaya</a>
        </div>
  </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.mitra.budidaya.update', $budidaya->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Foto Tempat</label>
                        <div class="custom-file">
                            <input 
                                type="file" 
                                name="photo"
                                id="customFile" onchange="openFile(event, '#img-budidaya')"
                                class="custom-file-input" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Tempat</label>
                        <input 
                            type="text" 
                            name="name"
                            value="{{ old('name') ? old('name') : $budidaya->name }}"
                            class="form-control" 
                            placeholder="Contoh : Budidaya Jamur Sumber Jaya Jember">
                    </div>
                    <div class="form-group">
                        <label for="">Luas</label>
                        <div class="input-group mb-3">
                            <input 
                                type="number" 
                                name="large"
                                value="{{ old('large') ? old('large') : $budidaya->large }}"
                                class="form-control" 
                                placeholder="Masukan Luas">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">M2</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Status Tempat</label>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ ($budidaya->status == 1) ? 'checked' : "" }}
                                type="radio" 
                                name="status"
                                value="1"
                                id="aktif" 
                                class="custom-control-input">
                            <label class="custom-control-label text-success font-weight-bold" for="aktif">Aktif</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ ($budidaya->status == 0) ? 'checked' : "" }}
                                type="radio" 
                                name="status"
                                value="0"
                                id="nonaktif" 
                                class="custom-control-input">
                            <label class="custom-control-label text-gray font-weight-bold" for="nonaktif">Nonaktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Saat Ini</label>
                        <div class="card bg-light shadow-none">
                            <div class="card-body">
                                {{ $budidaya->detail_address }}, 
                                {{ $budidaya->kelurahan }} - 
                                {{ $budidaya->kecamatan }} - 
                                {{ $budidaya->kabupaten }} - 
                                {{ $budidaya->provinsi }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Ganti Alamat</label>
                        <select 
                            data-location="provinsi" name="provinsi"
                            class="custom-select">
                                <option selected disabled>Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kabupaten" name="kabupaten" 
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kota/Kabupaten</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kecamatan" name="kecamatan"
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kelurahan" name="kelurahan"
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kelurahan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Ganti Detail Alamat</label>
                        <textarea 
                            name="detail_address" 
                            class="form-control" 
                            style="min-height: 100px">{{ old('detail_address') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Tambahkan</button>          
                    </form>                  
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="img-card">
                        <img src="{{ asset('storage/'.$budidaya->photo) }}" class="img-fluid" id="img-budidaya">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="font-weight-bold">Pekerja</h6>
                    @if ($budidaya->maintenance_by)
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="img-profile img-profile-sm shadow-light p-3">
                                <img src="{{ asset('storage/'.$budidaya->maintenance_by->photo) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="tx-14 font-weight-bolder">{{ $budidaya->maintenance_by->name }}</div>
                            <p class="">{{ $budidaya->maintenance_by->phone }}</p>
                            <div class="border-bottom mb-1 pb-1">Tanggal Bergabung :
                                <div class="font-weight-bold">{{ $budidaya->maintenance_by->joined_at }}</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-light text-center p-5 rounded-lg">
                        Tidak Ada Pekerja
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <style>
        #img-card {
            width: 100%;
            height: 320px;
            overflow: hidden;
            border-radius: 5px;
            display: flex; align-items: center; justify-content: center;
            position: relative;
        }
        #img-card::before {
            content: 'No Image Upload';
            display: inline-block;
            position: absolute;
        }
        #img-card img {
            position: relative;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
@endsection