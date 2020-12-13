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
			<a href="{{ route('dashboard.mitra.budidaya.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Budidaya</a>
		</div>
	</div>
@endsection

@section('content')

	<div class="row mb-5">
		<div class="col-md-auto mb-3 mb-md-0">
			<div id="img-card" class="shadow-light">
				<img src="{{ asset('storage/'.$budidaya->photo) }}" alt="">
			</div>
		</div>
		<div class="col-md">
			<div class="card card-body mb-0">
				<div class="row">
					<div class="col"><h5>{{ $budidaya->name }}</h5></div>
					<div class="col-auto"><a href="{{ route('dashboard.mitra.budidaya.edit', $budidaya->id) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a></div>
				</div>
				<div class="d-flex align-items-center mb-3">Status:
					@if ($budidaya->status === '1')
					<div class="badge badge-success ml-2">Aktif</div>
					@else
					<div class="badge badge-secondary ml-2">Nonaktif</div>
					@endif
				</div>
				<div class="border-bottom mb-1 pb-1">Detail Lokasi :
					<div class="font-weight-bold">
						{{ $budidaya->detail_address }}, 
						{{ $budidaya->kelurahan }} - 
						{{ $budidaya->kecamatan }} - 
						{{ $budidaya->kabupaten }} - 
						{{ $budidaya->provinsi }}	
					</div>
				</div>
				<div class="border-bottom mb-1 pb-1">Luas Tempat :
					<div class="font-weight-bold">{{ $budidaya->large }} M2</div>
				</div>
				<div class="">Tanggal Dibuat :
					<div class="font-weight-bold">{{ $budidaya->created_at }}</div>
				</div>
			</div>
		</div>
	</div>

	{{-- widget --}}
    <div class="row">
        <div class="col-md">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
					<i class="fas fa-warehouse"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Total Kumbung</h4>
					</div>
					<div class="card-body">
						{{ $kumbungTotal }}
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
						<h4>Pekerja</h4>
					</div>
					<div class="card-body">
						<div class="tx-18">
							@if ($budidaya->maintenance_by)
								{{ $budidaya->maintenance_by->name }}
							@else
								Tidak ada
							@endif
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
						<h4>Pemasukan Bersih</h4>
					</div>
					<div class="card-body text-success">
						Rp. {{ getIdrFormat($hasilBersih) }}
					</div>
                </div>
            </div>
        </div>
    </div>
	{{-- end of widget --}}


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
	<script src="{{ asset('js/page/index-0.js') }}"></script>
    <script>
		
    </script>
@endsection