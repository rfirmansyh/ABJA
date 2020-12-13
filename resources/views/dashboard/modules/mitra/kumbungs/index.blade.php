@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')
@section('header', 'Kumbung Saya')

@section('breadcrumb') {{-- section : breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Kumbung Saya</a></div>
@endsection {{-- section : breadcrumb --}}

@section('content-header') {{-- section : content-header --}}
  <div class="row gutters-xs align-items-center">
        <div class="col-md"><h2 class="section-title">Produksi Kumbung/Rumah Jamur</h2></div>
        <div class="col-md-auto"><a href="{{ route('dashboard.mitra.kumbung.create') }}" class="btn btn-block btn-lg btn-primary"><i class="fas fa-plus mr-2"></i> Tambah Kumbung</a></div>
  </div>
@endsection {{-- section : content-header --}}

@section('content') {{-- section : content --}}
    {{-- list budidaya --}}
    <div class="row mb-4">
        <div class="col-md">
            <h4 class="font-weight-bold border-bottom border-primary pb-3">{{ $budidayaSelected->name }}</h4>
        </div>
        <div class="col-md-4">
            <form action="" id="select_budidaya_id" method="get">
            <select 
                name="select_budidaya_id" 
                class="selectpicker" 
                data-style="form-control"
                data-live-search="true" 
                onchange=""
                title="Cari Budidaya..." 
                data-width="100%">
                    @foreach ($budidayas as $budidaya)
                        <option value="{{ $budidaya->id }}">{{ $budidaya->name }}</option>
                    @endforeach
            </select>
            </form>
        </div>
    </div>
    {{-- end of list budidaya --}}

    <div class="row">
        @foreach ($kumbungs as $kumbung)
        <div class="col-lg-6">
            <div class="card card-secondary border-bottom">
                <div class="card-header flex-column align-items-start tx-18 font-weight-bold">
                    Kumbung ID : {{ $kumbung->id }}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        {{--  --}}
                        <div class="col-lg-auto">
                            <div id="img-card">
                                <img src="{{ asset('storage/'.$kumbung->photo) }}" alt="">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-lg">
                            <div class="tx-18 font-weight-bold mb-3">{{ $kumbung->name }}</div>
                            <div class="d-flex align-items-center border-bottom mb-1 pb-2">Status:
                                @if ($kumbung->status === '1')
                                <div class="badge badge-success ml-2">Aktif</div>
                                @else
                                <div class="badge badge-secondary ml-2">Nonaktif</div>
                                @endif
                            </div>
                            <div class="border-bottom mb-1 pb-1">Luas Tempat :
                                <div class="font-weight-bold">{{ $kumbung->large }} M2</div>
                            </div>
                            <div class="border-bottom mb-1 pb-1">Type Jamur :
                                <div class="font-weight-bold">{{ $kumbung->jamur->name }} M2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top border-light d-flex justify-content-end">
                    <a href="{{ route('dashboard.mitra.kumbung.edit', $kumbung->id) }}" class="btn btn-sm btn-warning mr-1">Ubah</a>
                    <a href="{{ route('dashboard.mitra.kumbung.show', $kumbung->id) }}" class="btn btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div> 
        @endforeach
    </div>

    
@endsection {{-- section : content --}}

@section('modal') {{-- section : modal --}}
@endsection {{-- section : modal --}}

@section('style') {{-- section : style --}}
    <link rel="stylesheet" href="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.css') }}">
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
@endsection {{-- section : style --}}

@section('script') {{-- section : script --}}
    <script src="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>


    </script>
@endsection {{-- section : script --}}