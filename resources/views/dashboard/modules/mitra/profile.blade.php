@extends('dashboard._layouts.app-dashboard')

@section('title', 'Profil')

@section('header', 'Dashboard Mitra')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Profil Saya</a></div>
    <div class="breadcrumb-item">Profil</div>
@endsection
@section('content-header')
  <h2 class="section-title">Profil Saya</h2>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-auto">
        <div class="card">
            <div class="card-body">
                <div id="img-card">
                    <img src="{{ asset('storage/'.$mitra->photo) }}" class="img-fluid" id="img-user">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="name"
                        value="{{ old('name') ? old('name') : $mitra->name }}"
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
                        disabled
                        type="text" 
                        name="email" 
                        value="{{ $mitra->email }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="johndoe@mail.com">
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
                            value="{{ old('phone') ? old('phone') : $mitra->phone }}"
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
                        class="form-control" style="min-height: 100px">{{ old('bio') ? old('bio') : $mitra->bio }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Alamat Saat Ini</label>
                    <div class="card bg-light shadow-none">
                        <div class="card-body">
                            {{ $mitra->detail_address }}, 
                            {{ $mitra->kelurahan }} - 
                            {{ $mitra->kecamatan }} - 
                            {{ $mitra->kabupaten }} - 
                            {{ $mitra->provinsi }}
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
                    <label for="">Detail Alamat</label>
                    <textarea 
                        name="detail_address" 
                        class="form-control" 
                        style="min-height: 100px">{{ old('detail_address') }}</textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Ubah Data</button>
            </form>

            </div>
        </div>

        <a data-toggle="collapse" href="#c-password" class="tx-12 font-weight-bold" style="color: rgb(157, 157, 157);">Ganti Password ?</a>

        <div class="collapse @error('password') show @enderror" id="c-password">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <div class="input-group input-group-password">
                                <input 
                                    type="password" 
                                    name="password"
                                    value=""
                                    class="form-control @error('password') is-invalid @enderror">
                                <div class="input-group-append">
                                    <span class="input-group-text text-secondary csr-pointer" id="basic-addon2"><i class="fa fa-eye"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-warning ml-auto d-block">Ubah Passsword</button>
                    </form>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endsection