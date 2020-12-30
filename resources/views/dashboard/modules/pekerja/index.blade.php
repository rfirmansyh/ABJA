@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Dashboard Pekerja')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Activities</div>
@endsection
@section('content-header')
  <h2 class="section-title">Rincian Data Terbaru Mitra</h2>
@endsection

@section('content')
    
    @if ($budidaya !== null)
    {{-- widget --}}
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Produksi Selesai</h4>
                </div>
                <div class="card-body">
                    {{ $totalProductions }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                <i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Produksi In Progress</h4>
                </div>
                <div class="card-body">
                    {{ $totalProductionsActive }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                <i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Produksi Belum Dimulai</h4>
                </div>
                <div class="card-body">
                    {{ $totalProductionsNonActive }}
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- end of widget --}}

    <h5 class="section-title">Tempat Budidaya</h5>
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
				<div class="border-bottom mb-1 pb-1">Pemilik :
					<div class="font-weight-bold">{{ $budidaya->owned_by->name }}</div>
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
    @else
        
    @endif

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
@endsection