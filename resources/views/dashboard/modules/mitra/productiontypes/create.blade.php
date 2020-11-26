@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Produksi Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Produksi Saya</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Form Tambah Produksi Saya</h2></div>
        <div class="col-md-auto">
            <a href="{{ route('dashboard.mitra.productiontypes.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Produksi Saya</a>
        </div>
  </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('dashboard.mitra.productiontypes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nama Produksi</label>
                    <input 
                        type="text" 
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Ex: Produksi Tetangga">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="">Deskripsi</label>
                    <textarea 
                        name="description" 
                        class="form-control" 
                        style="min-height: 100px">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Tambahkan</button>  
            </form>    
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection