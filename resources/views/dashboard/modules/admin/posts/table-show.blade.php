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
                    <h5>Opsi</h5>
                    <div class="row gutters-xs">
                        <div class="col-sm">
                            <a id="btn-delete" href="{{ route('dashboard.admin.posts.delete', $post) }}" class="btn btn-block btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                        <div class="col-sm">
                            <a id="btn-update" href="{{ route('dashboard.admin.posts.edit', $post) }}" class="btn btn-block btn-warning"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('#btn-delete').on('click', function(e) {
        e.preventDefault();
        const target_url = $(this).attr('href');
        console.log(target_url);
        Swal.fire({
            title: 'Hapus Data ?',
            text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Hapus!',
            cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = target_url;
            }
        })
    })
</script>
@endsection