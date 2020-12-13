@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Detail Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Tempat Budidaya</a></div>
    <div class="breadcrumb-item">Budidaya Sumber Maju Jember</div>
@endsection
@section('content-header')
	<div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Detail Rincian Data</h2></div>
		<div class="col-md-auto">
			<a href="{{ route('dashboard.mitra.kumbung.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Kumbung</a>
		</div>
	</div>
@endsection

@section('content')

    {{-- widget --}}
    <div class="row">
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
					<i class="fas fa-warehouse"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Tempat Budidaya</h4>
					</div>
					<div class="card-body">
						<div class="tx-12">{{ $kumbung->budidaya->name }}</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                	<i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Produksi Selesai</h4>
					</div>
					<div class="card-body">
						<div class="tx-18">
                            {{ $kumbung->productions()->count() }}
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
					<div class="card-header">
						<h4>Hasil Panen</h4>
					</div>
					<div class="card-body text-success">
						{{ isset($hasilPanen) ? $hasilPanen : 0 }} gram
					</div>
                </div>
            </div>
        </div>
    </div>
	{{-- end of widget --}}

	<div class="row mb-5">
		<div class="col-md-auto mb-3 mb-md-0">
			<div id="img-card" class="shadow-light">
				<img src="{{ asset('storage/'.$kumbung->photo) }}" alt="">
			</div>
		</div>
		<div class="col-md">
			<div class="card card-body mb-0">
				<div class="row mb-3">
					<div class="col">
                        <h5>Kumbung ID : {{ $kumbung->id }}</h5>
                        <div>{{ $kumbung->name }}</div>
                    </div>
					<div class="col-auto"><a href="{{ route('dashboard.mitra.kumbung.edit', $kumbung->id) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a></div>
				</div>
				<div class="d-flex align-items-center mb-3">Status:
					@if ($kumbung->status === '1')
					<div class="badge badge-success ml-2">Aktif</div>
					@else
					<div class="badge badge-secondary ml-2">Nonaktif</div>
					@endif
				</div>
				<div class="border-bottom mb-1 pb-1">Luas Tempat :
					<div class="font-weight-bold">{{ $kumbung->large }} M2</div>
				</div>
				<div class="">Tanggal Dibuat :
					<div class="font-weight-bold">{{ $kumbung->created_at }}</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('style')
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
@endsection