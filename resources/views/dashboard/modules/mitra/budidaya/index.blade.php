@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Tempat Budidaya</a></div>
    {{-- <div class="breadcrumb-item">Activities</div> --}}
@endsection
@section('content-header')
  <div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Daftar Tempat Budidaya Saya</h2></div>
		<div class="col-md-auto">
        	<a href="{{ route('dashboard.mitra.budidaya.create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Tempat Budidaya</a>
        </div>
  </div>
@endsection

@section('content')

    {{-- if widget added --}}
    {{-- end of if widget added --}}
    {{-- filter --}}
    <div class="card card-primary">
        <div class="card-body">
            {{--  --}}
            <div class="card-title d-flex justify-content-between">
                <h2 class="tx-24 font-weight-bolder">Filter</h2>
                <button data-toggle="collapse" data-target="#collapseExample" class="btn btn-sm btn-outline-primary py-0 px-3"><i class="fas fa-filter"></i></button>
            </div>
            <hr>
            <div class="collapse {{ $filtered ? 'show' : '' }}" id="collapseExample">
                <form action=""{{ url()->current() }} method="GET">
                    <div class="row align-items-end gutters-xs border-bottom pb-4 mb-5"> 
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Pilih Status</label>
                                <select name="status" class="custom-select">
                                    <option value="*" selected>Semua</option>
                                    <option {{ isset($filtered['status']) && $filtered['status'] === '1' ? 'selected' : '' }} value="1">Aktif</option>
                                    <option {{ isset($filtered['status']) && $filtered['status'] === '0' ? 'selected' : '' }} value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Pilih Lokasi Kota</label>
                                <select name="kabupaten" class="custom-select">
                                    <option value="" selected>Semua</option>
                                    @foreach ($locations as $location)
                                        <option {{ isset($filtered['location']) && $filtered['location'] === $location->kabupaten ? 'selected' : '' }} value="{{ $location->kabupaten }}">{{ $location->kabupaten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Luas</label>
                                <select name="large" class="custom-select">
                                    <option value="" selected>Semua</option>
                                    <option {{ isset($filtered['large']) && $filtered['large'] === '10' ? 'selected' : '' }} value="10">> 10 M2</option>
                                    <option {{ isset($filtered['large']) && $filtered['large'] === '20' ? 'selected' : '' }} value="20">> 20 M2</option>
                                    <option {{ isset($filtered['large']) && $filtered['large'] === '50' ? 'selected' : '' }} value="50">> 50 M2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Tahun Dibuat</label>
                                <select name="year" class="custom-select">
                                    <option value="" selected>Semua</option>
                                    <option {{ isset($filtered['year']) && $filtered['year'] === '1' ? 'selected' : '' }} value="1">1 Tahun Lalu</option>
                                    <option {{ isset($filtered['year']) && $filtered['year'] === '2' ? 'selected' : '' }} value="2">2 Tahun Lalu</option>
                                    <option {{ isset($filtered['year']) && $filtered['year'] === '3' ? 'selected' : '' }} value="3">3 Tahun Lalu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 d-none d-md-block mb-3"></div>
                        <div class="col-md">
                            <div class="form-group mb-md-0">
                                <label for="">Nama Tempat</label>
                                <input name="keyword" value="{{ isset($filtered['keyword']) ? $filtered['keyword'] : '' }}" type="text" class="form-control" placeholder="Masukan Nama Untuk Dicari">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <button name="filter" value="submit" type="submit" class="btn btn-block btn-lg btn-outline-primary">Proses Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                @foreach ($budidayas as $i => $budidaya)
                <div class="col-lg-6">
                    <div class="card card-success border-bottom">
                        <div class="card-header tx-18 font-weight-bold"> {{ $budidaya->name }} </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-auto">
                                    <div id="img-card">
                                        <img src="{{ asset('storage/'.$budidaya->photo) }}" alt="">
									</div>
                                </div>
                                <div class="col-lg">
                                    <div class="d-flex align-items-center border-bottom mb-1 pb-2">Status:
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
                                    <div class="border-bottom mb-1 pb-1">Tanggal Dibuat :
                                        <div class="font-weight-bold">{{ $budidaya->created_at }}</div>
                                    </div>
                                    <div class="">Pekerja (maintener) :
                                        @if ($budidaya->maintenance_by)
                                            <div class="font-weight-bold">{{ $budidaya->maintenance_by->name }}</div>
                                        @else
                                            <div class="font-weight-bold">Tidak ada</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="card-footer border-top border-light d-flex justify-content-end">
							<a href="{{ route('dashboard.mitra.budidaya.edit', $budidaya->id) }}" class="btn btn-sm btn-warning mr-1">Ubah</a>
							<a href="{{ route('dashboard.mitra.budidaya.show', $budidaya->id) }}" class="btn btn-sm btn-primary">Detail</a>
						</div>
                    </div>
                </div>    
                @endforeach
            </div>

            <div class="row justify-content-center justify-content-md-end">
                <div class="col-auto">{{$budidayas->appends(Request::all())->links()}}</div>
            </div>
        </div>
    </div>
    {{-- end of filter --}}

    
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <style>
        #img-card {
            border-radius: 5px;
            width: 140px;
            height: 150px;
            overflow: hidden;
        }
        #img-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        @media screen and (max-width: 991.98px) {
            #img-card {
                width: 220px;
                margin-bottom: 25px;
            }
        }
        @media screen and (max-width: 575.98px) {
            #img-card {
				width: 100%;
				height: 240px;
                margin-bottom: 25px;
            }
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endsection