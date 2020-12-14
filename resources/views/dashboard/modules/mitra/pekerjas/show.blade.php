@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Detail Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Pekerja</a></div>
    <div class="breadcrumb-item">Profil Pekerja</div>
@endsection
@section('content-header')
	<div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Detail Profil Pekerja</h2></div>
		<div class="col-md-auto">
			<a href="{{ route('dashboard.mitra.pekerjas.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Mitra</a>
		</div>
	</div>
@endsection

@section('content')

    {{-- widget --}}
    <div class="row">
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
					<i class="fas fa-map"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Tempat Bekerja</h4>
					</div>
					<div class="card-body">
						<div class="tx-12">{{ $pekerja->maintance_on->name }}</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                	<i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Total Produksi Selesai</h4>
					</div>
					<div class="card-body">
						<div class="tx-18">
                            {{ $pekerja->production_makers()->count() }}
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Bergabung Sejak</h4>
					</div>
					<div class="card-body text-success">
						<div class="tx-14">{{ \Carbon\Carbon::parse($pekerja->created_at)->format('j M Y') }}</div>
					</div>
                </div>
            </div>
        </div>
    </div>
	{{-- end of widget --}}

    <div class="card card-body mb-0 rounded-lg">
        <div class="row justify-content-center">
            <div class="col-auto mb-md-0">
                <div class="img-profile img-profile-md shadow-light p-3">
                    <img src="{{ asset('storage/'.$pekerja->photo) }}" alt="">
                </div>
            </div>
            <div class="col-lg-7 pt-3">
                <div class="row mb-3">
                    <div class="col">
                        <h3 class="mb-0">{{ $pekerja->name }}</h3>
                        <h6 class="text-secondary">{{ $pekerja->email }}</h6>
                    </div>
                    <div class="col-auto"><a href="" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a></div>
                </div>
                <div class="d-flex align-items-center mb-3">Status:
                    @if ($pekerja->status == 1)
                        <div class="badge badge-success ml-2">Aktif</div>
                    @else
                    <div class="badge badge-secondary ml-2">Nonaktif</div>
                    @endif
                </div>
                <div class="border-bottom mb-3 pb-1">Nomor Hp :
                    <div class="font-weight-bold">{{ '0'.$pekerja->phone }}</div>
                </div>
                <div class="border-bottom mb-3 pb-1">Bio :
                    <div class="font-weight-bold">{{ $pekerja->bio }}</div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <style>
        #img-card {
            width: 320px;
            height: 100%;
            overflow: hidden;
            border-radius: 5px;
        }
        #img-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
		}
		@media screen and (max-width: 575.98px) {
            #img-card {
				width: 100%;
				height: 240px;
            }
        }
    </style>
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
	<script src="{{ asset('js/page/index-0.js') }}"></script>
    <script>
        var openFile = function(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const dataURL = reader.result;
                const output =  document.querySelector('#img-card > img');
                output.src = dataURL;
                console.log(output.src)
            }
            reader.readAsDataURL(input.files[0])
		}
		
    </script>
@endsection