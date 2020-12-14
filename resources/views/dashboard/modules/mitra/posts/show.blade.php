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
        	<a href="{{ url()->previous() }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
        </div>
  </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8"> {{-- left section --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">{{ $post->title }}</h5>
                    <span>{{ $post->created_by->name }}</span>
                    {{-- Main Post --}}
                    <div class="img-post mb-3"> {{-- page styling --}}
                        @if ($post->photo)
                            <img src="{{ asset('storage/'.$post->photo) }}" alt="...">
                        @else
                            <img src="{{ asset('storage/photo/post/default-post.png') }}" alt="...">
                        @endif
                    </div>
                    <p>{!! $post->body !!}</p>
                </div>
            </div>
        </div> {{-- end of left section --}}

        <div class="col-lg-4"> {{-- right section --}}
            <div class="card">
                <div class="card-body px-3">
                    <h5>Kabar Lainnya</h5>
                    @foreach ($otherPosts as $p)
                    <a href="{{ route('dashboard.mitra.posts.show', $post->slug) }}">
                    <div class="card mb-2">
                        <div class="card-body p-3">
                            <div class="row gutters-xs">
                                <div class="col-xl-4">
                                    @if ($p->photo)
                                        <img src="{{ asset('storage/'.$p->photo) }}" alt="..." class="img-fluid">
                                    @else
                                        <img src="{{ asset('storage/photo/post/default-post.png') }}" alt="..." class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-xl pl-2">
                                    <div class="tx-12 mb-2 font-weight-bold">{{ substr($p->body, 0, 50).( (strlen($p->body) > 50) ? '...' : ''  ) }}</div>
                                    <p class="tx-10 mb-0" style="line-height: 2">{{ substr(strip_tags($p->body), 0, 60).( (strlen(strip_tags($p->body)) > 50) ? '...' : ''  ) }}</p>
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
        .img-post {
            width: 100%;
            height: 400px;
        }
        .img-post img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
@endsection