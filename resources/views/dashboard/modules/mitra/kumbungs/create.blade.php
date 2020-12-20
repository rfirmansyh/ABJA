@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tambah Kumbung Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Kumbung Saya</a></div>
    <div class="breadcrumb-item">Ubah Kumbung Saya</div>
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Form Tambah Tempat Budidaya</h2></div>
        <div class="col-md-auto">
            <a href="{{ route('dashboard.mitra.kumbung.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Budidaya</a>
        </div>
  </div>
@endsection

@section('content')
    <form action="{{ route('dashboard.mitra.kumbung.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Foto Kumbung</label>
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
                            <label for="">Nama Kumbung</label>
                            <input 
                                value="{{ old('name') }}"
                                type="text" 
                                name="name"
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Contoh : Kumbung 1 {{ Auth::user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Budiadaya Untuk Kumbung</label>
                            <select 
                                name="budidaya_id" 
                                class="selectpicker @error('budidaya_id') is-invalid @enderror" 
                                data-style="form-control"
                                data-live-search="true" 
                                onchange=""
                                title="Cari Budidaya..." 
                                data-width="100%">
                                    @foreach ($budidayas as $budidaya)
                                        <option {{ old('budidaya_id') == $budidaya->id ? 'selected' : '' }} value="{{ $budidaya->id }}">{{ $budidaya->name }}</option>
                                    @endforeach
                            </select>
                            @error('budidaya_id')
                                <span class="tx-12 text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Luas</label>
                            <div class="input-group mb-3">
                                <input 
                                    value="{{ old('large') }}"
                                    type="number" 
                                    step="0.01" 
                                    name="large"
                                    class="form-control @error('large') is-invalid @enderror" 
                                    placeholder="Masukan Luas">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">M2</span>
                                </div>
                                @error('large')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status Kumbung</label>
                            <div class="custom-control custom-radio">
                                <input 
                                    type="radio" 
                                    name="status"
                                    value="1"
                                    id="aktif" 
                                    {{ old('status') === '1' ? 'checked' : '' }}
                                    class="custom-control-input @error('status') is-invalid @enderror">
                                <label class="custom-control-label text-success font-weight-bold" for="aktif">Aktif</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input 
                                    type="radio" 
                                    name="status"
                                    value="0"
                                    id="nonaktif" 
                                    {{ old('status') === '0' ? 'checked' : '' }}
                                    class="custom-control-input  @error('status') is-invalid @enderror">
                                <label class="custom-control-label text-gray font-weight-bold" for="nonaktif">Nonaktif</label>
                            </div>
                            @error('status')
                                <span class="tx-12 text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jenis Jamur Pada Kumbung</label>
                            <select  name="jamur_id" class="custom-select @error('jamur_id') is-invalid @enderror">
                                <option {{ old('jamur_id') ? '' : 'selected' }} disabled>Pilih Jenis Jamur</option>
                                @foreach ($jamurs as $jamur)
                                    <option {{ old('jamur_id') == $jamur->id ? 'selected' : '' }} value="{{ $jamur->id }}">{{ $jamur->name }}</option>
                                @endforeach
                            </select>
                            @error('jamur_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Tambahkan</button> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="img-card">
                            <img src="" class="img-fluid" id="img-budidaya">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('style')
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
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
        }
    </style>
@endsection

@section('script')
    
@endsection