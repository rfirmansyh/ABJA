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
        	{{-- <a href="{{ route('dashboard.pekerja.budidaya.create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Tempat Budidaya</a> --}}
        </div>
  </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8"> {{-- left section --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Headline Minggu Ini</h5>
                    {{-- Main Post --}}
                    <div id="carouselExampleCaptions" class="carousel slide carousel-fade mb-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($headlines as $i => $headline)
                            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($headlines as $i => $headline)
                                
                                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                        @if ($headline->photo)
                                            <img src="{{ asset('storage/'.$headline->photo) }}" alt="...">
                                        @else
                                            <img src="{{ asset('storage/photo/post/default-post.png') }}" alt="...">
                                        @endif
                                        <div class="carousel-caption d-none d-md-block">
                                        <a class="text-white" href="{{ route('dashboard.pekerja.posts.show', $headline->slug) }}">
                                            <h5>{{ $headline->title }}</h5>
                                            <p>{{ substr(strip_tags($headline->body), 0, 60).( (strlen(strip_tags($headline->body)) > 50) ? '...' : ''  ) }}</p>
                                        </a>
                                        </div>
                                    </div>
                                
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- end of Main Post --}}
        
                    <h5 class="font-weight-bold">Pilih Kategori</h5>
                    <div class="row mb-4">
                        @foreach ($categories as $category)
                            <div class="col-auto">{{ $category->name }}</div>    
                        @endforeach
                    </div>
        
                    {{-- All Post --}}
                    @foreach ($posts as $post)
                        <a href="{{ route('dashboard.pekerja.posts.show', $post->slug) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            @if ($post->photo)
                                                <img src="{{ asset('storage/'.$post->photo) }}" alt="..." class="img-fluid">
                                            @else
                                                <img src="{{ asset('storage/photo/post/default-post.png') }}" alt="..." class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-xl">
                                            <h5>{{ $post->title }}</h5>
                                            <p>{{ substr(strip_tags($post->body), 0, 60).( (strlen(strip_tags($post->body)) > 50) ? '...' : ''  ) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div> {{-- end of left section --}}

        <div class="col-lg-4"> {{-- right section --}}
            <div class="card">
                <div class="card-body px-3">
                    <h5>Kabar Lainnya</h5>
                    @foreach ($otherPosts as $post)
                    <a href="{{ route('dashboard.pekerja.posts.show', $post->slug) }}">
                        <div class="card mb-2">
                            <div class="card-body p-3">
                                <div class="row gutters-xs">
                                    <div class="col-xl-4">
                                        @if ($post->photo)
                                            <img src="{{ asset('storage/'.$post->photo) }}" alt="..." class="img-fluid">
                                        @else
                                            <img src="{{ asset('storage/photo/post/default-post.png') }}" alt="..." class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="col-xl pl-2">
                                        <div class="tx-12 mb-2 font-weight-bold">{{ substr($post->body, 0, 50).( (strlen($post->body) > 50) ? '...' : ''  ) }}</div>
                                        <p class="tx-10 mb-0" style="line-height: 2">{{ substr(strip_tags($post->body), 0, 60).( (strlen(strip_tags($post->body)) > 50) ? '...' : ''  ) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div> {{-- end of right section --}}
    </div>
    
@endsection

@section('style')
<style>
    a {
        color: gray;
    }
    a:hover {
        color: gray;
    }
    .carousel-item {
        height: 300px;
    }
    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .carousel-caption {
        background: rgb(56,56,56);
        background: linear-gradient(21deg, rgba(56,56,56,1) 0%, rgba(255,255,255,0) 99%);
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>
@endsection

@section('script')
@endsection