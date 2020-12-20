@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Berita Jamur</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Berita Jamur</h2></div>
		<div class="col-md-auto">
        	<a href="{{ route('dashboard.admin.posts.table') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Olah Post</a>
        </div>
  </div>
@endsection

@section('content')

<form action="{{ route('dashboard.admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Foto Post</label>
                        <div class="custom-file">
                            <input 
                                type="file" 
                                name="photo"
                                id="customFile" onchange="openFile(event, '#img-post')"
                                class="custom-file-input" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Post</label>
                        <input 
                            value="{{ $post->title }}"
                            type="text" 
                            name="title"
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="Contoh : Jember Menjadi Budidaya Terbaik">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Url Post</label>
                        <input 
                            value="{{ $post->slug }}"
                            type="text" 
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror" 
                            placeholder="Contoh : Jember-Menjadi-Budidaya-Terbaik">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="@error('body') text-danger @enderror">Konten</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                        @error('body')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jadikan Headline</label>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ $post->is_headline === 'true' ? 'checked' : '' }}
                                type="radio" 
                                name="is_headline"
                                value="true"
                                id="aktif" 
                                class="custom-control-input @error('is_headline') is-invalid @enderror">
                            <label class="custom-control-label text-success font-weight-bold" for="aktif"><i class="fas fa-check"></i></label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ $post->is_headline === 'false' ? 'checked' : '' }}
                                type="radio" 
                                name="is_headline"
                                value="false"
                                id="nonaktif" 
                                class="custom-control-input  @error('is_headline') is-invalid @enderror">
                            <label class="custom-control-label text-gray font-weight-bold" for="nonaktif"><i class="fas fa-times"></i></label>
                        </div>
                        @error('is_headline')
                            <span class="tx-12 text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select 
                            name="category_id" 
                            class="selectpicker @error('category_id') is-invalid @enderror" 
                            data-style="form-control"
                            data-live-search="true" 
                            onchange=""
                            title="Cari Kategori..." 
                            data-width="100%">
                                @foreach ($categories as $category)
                                    <option {{ $post->category_id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <span class="tx-12 text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Ubah</button>          
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="img-card">
                        <img src="{{ asset('storage/'. $post->photo) }}" class="img-fluid" id="img-post">
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
<script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>
@endsection