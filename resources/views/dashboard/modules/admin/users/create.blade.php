@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tambah Mitra Manual')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Mitra</a></div>
    <div class="breadcrumb-item">Tambah Mitra Manual</div>
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Form Tambah Mitra</h2></div>
        <div class="col-md-auto">
            <a href="{{ route('dashboard.admin.users.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Mitra</a>
        </div>
  </div>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-body">
                    <div id="img-card">
                        <img src="" class="img-fluid" id="img-user">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('dashboard.admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input 
                            type="text" 
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Ex: johndoe">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Foto Profil</label>
                        <div class="custom-file">
                            <input 
                                type="file" 
                                name="photo"
                                id="customFile" onchange="openFile(event, '#img-user')"
                                class="custom-file-input">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input 
                            type="text" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="johndoe@mail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="d-flex align-items-center justify-content-between">Password
                            <small id="emailHelp" class="form-text text-muted tx-10">Password Tergenerate Otomatis dari Sistem</small>
                        </label>
                        <div class="input-group input-group-password">
                            <input 
                                type="password" 
                                name="password"
                                value="{{ $password }}"
                                class="form-control @error('password') is-invalid @enderror" readonly>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text text-secondary csr-pointer" id="basic-addon2"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="d-flex align-items-center justify-content-between">Nomor Hp
                            <small id="emailHelp" class="form-text text-muted tx-10">Ex. 85748572354 (Tanpa awalan 0)</small>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon2">+62</span>
                            </div>
                            <input 
                                type="tel" 
                                name="phone"
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Masukan Nomor">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Bio</label>
                        <textarea 
                            name="bio"
                            class="form-control" style="min-height: 100px">{{ old('bio') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Alamat</label>
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
                        <label for="">Detail Alamat</label>
                        <textarea 
                            name="detail_address" 
                            class="form-control" 
                            style="min-height: 100px">{{ old('detail_address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Status Mitra</label>
                        <div class="custom-control custom-radio">
                            <input 
                                type="radio" 
                                name="status" 
                                value="1"
                                id="aktif"  
                                class="custom-control-input @error('status') is-invalid @enderror" >
                            <label class="custom-control-label text-success font-weight-bold" for="aktif">Aktif</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input 
                                type="radio" 
                                name="status" 
                                value="0"
                                id="nonaktif"  
                                class="custom-control-input  @error('status') is-invalid @enderror" >
                            <label class="custom-control-label text-gray font-weight-bold" for="nonaktif">Nonaktif</label>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Tambahkan</button>
                </form>                    
                </div>
                
            </div>
        </div>
    </div>

    
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <style>
        #img-card {
            width: 180px;
            height: 180px;
            overflow: hidden;
            border-radius: 5px;
            display: flex; align-items: center; justify-content: center;
            position: relative;
            border-radius: 50%;
            background-color: gainsboro;
        }
        #img-card::before {
            content: 'No Image Upload';
            display: inline-block;
            position: absolute;
        }
        #img-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: none;
            position: relative;
        }
    </style>
@endsection

@section('script')
    <script>
        $(function() {
            // getProvinsi : init provinsi location first on select input
            $.ajax({
                url: getProvinsi(),
                success: function(result) {
                    console.log(result.data);
                    result.data.forEach((data) => {
                        $('select[data-location="provinsi"]').append(`<option id="${data.id}" value="${data.name}">${data.name}</option>`)
                    })
                }
            });
            $('select[data-location="provinsi"]').on('change', function() {
                $('select[data-location="kabupaten"]').attr('disabled', 'disabled');
                $('select[data-location="kecamatan"]').attr('disabled', 'disabled');
                $('select[data-location="kelurahan"]').attr('disabled', 'disabled');
                $.ajax({
                    url: getKabupaten($(this).find('option:selected').prop('id')),
                    success: function(result) {
                        $('select[data-location="kabupaten"]')
                            .removeAttr('disabled')
                            .html('<option selected disabled>Pilih Kota/Kabupaten</option>');
                        result.data.forEach((data) => {
                            $('select[data-location="kabupaten"]').append(`<option id="${data.id}" value="${data.name}">${data.name}</option>`)
                        })
                    }
                });
            });
            $('select[data-location="kabupaten"]').on('change', function() {
                $('select[data-location="kecamatan"]').attr('disabled', 'disabled');
                $('select[data-location="kelurahan"]').attr('disabled', 'disabled');
                $.ajax({
                    url: getKecamatan($(this).find('option:selected').prop('id')),
                    success: async function(result) {
                        $('select[data-location="kecamatan"]')
                            .removeAttr('disabled')
                            .html('<option selected disabled>Pilih Kecamatan</option>');
                        result.data.forEach((data) => {
                            $('select[data-location="kecamatan"]').append(`<option id="${data.id}" value="${data.name}">${data.name}</option>`)
                        })
                    }
                });
            });
            $('select[data-location="kecamatan"]').on('change', function() {
                $('select[data-location="kelurahan"]').attr('disabled', 'disabled');
                $.ajax({
                    url: getKelurahan($(this).find('option:selected').prop('id')),
                    success: async function(result) {
                        $('select[data-location="kelurahan"]')
                            .removeAttr('disabled')
                            .html('<option selected disabled>Pilih Kelurahan</option>');
                        result.data.forEach((data) => {
                            $('select[data-location="kelurahan"]').append(`<option id="${data.id}" value="${data.name}">${data.name}</option>`)
                        })
                    }
                });
            });
        })
    </script>
@endsection