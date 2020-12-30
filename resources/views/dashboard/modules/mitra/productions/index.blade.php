@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')
@section('header', 'Produksi')

@section('breadcrumb') {{-- section : breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Produksi</a></div>
@endsection {{-- section : breadcrumb --}}

@section('content-header') {{-- section : content-header --}}
  <div class="row gutters-xs align-items-center">
        <div class="col-md"><h2 class="section-title">Produksi Kumbung/Rumah Jamur</h2></div>
        <div class="col-md-auto"><a href="{{ route('dashboard.mitra.productions.index.table') }}" class="btn btn-outline-info">Tampilkan Semua Tabel Produksi</a></div>
        <div class="col-md-auto"><a href="{{ route('dashboard.mitra.productions.index.panen') }}" class="btn btn-outline-info">Tampilkan Panen Bulanan</a></div>
  </div>
@endsection {{-- section : content-header --}}

@section('content') {{-- section : content --}}
    
    @if (isset($budidayaSelected))
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

        {{-- main content --}}
        <div class="card card-primary">
            <div class="card-body">
                {{-- filter --}}
                <div class="card-title d-flex justify-content-between">
                    <h2 class="tx-24 font-weight-bolder">Filter</h2>
                    <button data-toggle="collapse" data-target="#collapseExample" class="btn btn-sm btn-outline-primary py-0 px-3"><i class="fas fa-filter"></i></button>
                </div>
                <hr>
                <div class="collapse" id="collapseExample">
                    <div class="row align-items-end gutters-xs border-bottom pb-4 mb-5"> 
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Pilih Status</label>
                                <select class="custom-select">
                                    <option selected>Semua</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Pilih Lokasi Kota</label>
                                <select class="custom-select">
                                    <option selected>Semua</option>
                                    <option value="1">Jember</option>
                                    <option value="2">Lumajang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Luas</label>
                                <select class="custom-select">
                                    <option selected>Semua</option>
                                    <option value="1">> 10 M2</option>
                                    <option value="2">Lumajang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3 mb-md-0">
                                <label for="">Tanggal Buat</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 d-none d-md-block mb-3"></div>
                        <div class="col-md">
                            <div class="form-group mb-md-0">
                                <label for="">Nama Tempat</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Untuk Dicari">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-block btn-lg btn-outline-primary">Proses Filter</button>
                        </div>
                    </div>
                </div>
                {{-- end of filter --}}

                <div class="row">
                    @foreach ($kumbungs as $kumbung)
                    @php
                        $progress = null; 
                        // check apa ada produksi di kumbung terkait
                        if ($kumbung->productions()->orderBy('id', 'desc')->first()) {
                            // check apa status sedang inprogress / '1' ?
                            if ($kumbung->productions()->orderBy('id', 'desc')->first()->status === '1') {
                                $progress = getProgress($kumbung->productions()->orderBy('id', 'desc')->first()->created_at, $kumbung->productions()->orderBy('id', 'desc')->first()->done_at);
                            }
                        }
                    @endphp

                    <div class="col-lg-6">
                        <div class="card card-secondary border-bottom">
                            <div class="card-header flex-column align-items-start tx-18 font-weight-bold">
                                Kumbung ID : {{ $kumbung->id }}
                                <div class="tx-12">{{ $kumbung->name }}</div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    {{--  --}}
                                    <div class="col-lg-auto">
                                        <div id="img-card">
                                            <img src="{{ asset('img/kumbung/default-kumbung.png') }}" alt="">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-lg">
                                        <div class="border-bottom mb-1 pb-1">Di Produksi Oleh :
                                            <div class="font-weight-bold">
                                                @if ($progress)
                                                    {{ $kumbung->productions()->orderBy('id', 'desc')->first()->usermake->name }}    
                                                @else
                                                    Belum Ada Produksi
                                                @endif
                                            </div>
                                        </div>
                                        <div class="border-bottom mb-1 pb-1">Banyak Produksi :
                                            <div class="font-weight-bold">
                                                {{ count($kumbung->productions) }}x Produksi
                                            </div>
                                        </div>
                                        <div class="">Terakhir Selesai Produksi :
                                            <div class="font-weight-bold">
                                                @if (count($kumbung->productions) > 1) 
                                                    {{ \Carbon\Carbon::parse($kumbung->productions()->orderBy('id', 'desc')->get()[1]->done_at)->toDayDateTimeString() }}    
                                                @else
                                                    Belum Ada
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if ($progress)
                                        <div class="col">
                                            <div class="font-weight-bold mb-2">Progress Produksi : {{ round($progress->percentage,2) }}% : {{ $progress->time_remain }}</div>
                                            <div class="progress">
                                                <div class="progress-bar text-dark" 
                                                    role="progressbar" 
                                                    style="width: {{ round($progress->percentage,2) }}%; overflow: visible;">
                                                    {{ round($progress->percentage,2) }}% : {{ $progress->time_remain }}</div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col">
                                            <div class="font-weight-bold mb-2">Progress Produksi : Belum Melakukan Produksi</div>
                                            <div class="progress">
                                                <div class="progress-bar text-dark" 
                                                    role="progressbar" 
                                                    style="width: 0%; overflow: visible;">
                                                    Belum Melakukan Produksi</div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer border-top border-light">
                                <div class="row gutters-xs justify-content-end">
                                    <div class="col-sm mb-2 mb-sm-0">
                                        <button class="btn btn-block h-100 btn-outline-primary">Detail Produksi</button>
                                    </div>
                                    @if ($progress)
                                    <div class="col-sm mb-2 mb-sm-0">
                                        <button data-inputdata-production-id="{{ $kumbung->productions()->orderBy('id', 'desc')->first()->id }}" class="btn btn-block h-100 btn-primary">Input Data</button>
                                    </div>
                                    @endif
                                    <div class="col-sm">
                                        @if ($progress && $progress->percentage < 100)
                                            <button class="btn btn-block h-100 btn-outline-secondary" disabled>Dalam Proses</button>    
                                        @elseif ($progress && $progress->percentage == 100)
                                            <button 
                                                data-updatestatus-production-id="{{ $kumbung->productions()->orderBy('id', 'desc')->first()->id }}" 
                                                class="btn btn-block h-100 btn-success">Selesaikan</button>   
                                        @else
                                            <button data-toggle="modal" data-target="#m-production-start" data-send="{{ $kumbung->id }}" class="btn btn-block h-100 btn-primary">Mulai Produksi</button>   
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endforeach

                    
                </div>

            </div>
        </div>
        {{-- end of main content --}}

        <div class="row justify-content-center justify-content-md-end">
            <div class="col-auto">{{$kumbungs->appends(Request::all())->links()}}</div>
        </div>
    @else
        {{-- list budidaya --}}
        <div class="row mb-4">
            <div class="col-md">
                <h4 class="font-weight-bold border-bottom border-primary pb-3">Tidak ada data</h4>
            </div>
        </div>
        {{-- end of list budidaya --}}
    @endif

    
@endsection {{-- section : content --}}

@section('modal') {{-- section : modal --}}
    {{-- modal : production-start --}}
    <div class="modal fade" id="m-production-start" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mulai Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dashboard.mitra.productions.store') }}" method="POST" enctype="multipart/form-data"> {{-- form --}}
                @csrf
                <div class="modal-body">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="kebutuhan_new-tab" data-toggle="tab" href="#kebutuhan_new">Kebutuhan</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="detail">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <label for="">Jenis produksi</label>
                                        <select name="production_type_id" class="custom-select">
                                            @foreach ($productionTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nama produksi</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Tanggal Mulai</label>
                                        <input type="text" name="created_at" id="created_at" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Tanggal Selesai/Panen</label>
                                        <input type="text" name="done_at" id="done_at" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <label for="">Deskripsi produksi</label>
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Kumbung ID</label>
                                        <input type="text" id="kumbung_id" name="kumbung_id" value="" class="form-control" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Dibuat Oleh</label>
                                        <input type="hidden" name="updated_by_uid" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="maked_by_uid" value="{{ Auth::user()->id }}">
                                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kebutuhan_new">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Kebutuhan 1</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tipe Kebutuhan</label>
                                        <select 
                                            name="kebutuhan_type_id[]" 
                                            class="selectpicker" 
                                            data-style="form-control"
                                            data-live-search="true" 
                                            onchange=""
                                            title="Cari Jenis Kebutuhan..." 
                                            data-width="100%">
                                                @foreach ($kebutuhanTypes as $kebutuhanType)
                                                    <option value="{{ $kebutuhanType->id }}">{{ $kebutuhanType->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="kebutuhan_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                readonly>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Unknown</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pengeluaran</label>
                                        <input name="pengeluaran_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Kebutuhan 2</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tipe Kebutuhan</label>
                                        <select 
                                            name="kebutuhan_type_id[]" 
                                            class="selectpicker" 
                                            data-style="form-control"
                                            data-live-search="true" 
                                            onchange=""
                                            title="Cari Jenis Kebutuhan..." 
                                            data-width="100%">
                                                @foreach ($kebutuhanTypes as $kebutuhanType)
                                                    <option value="{{ $kebutuhanType->id }}">{{ $kebutuhanType->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="kebutuhan_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Unknown</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pengeluaran</label>
                                        <input name="pengeluaran_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-link ml-auto">Tambah Kebutuhan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form> {{-- end of form --}}
            </div>
        </div>
    </div>

    {{-- modal : input data --}}
    <div class="modal fade" id="m-input-data" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Data Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data"> {{-- form --}}
                @csrf @method('PUT')
                @error('panen_nominal*')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="modal-body">
                    {{-- user who last change --}}
                    <input type="hidden" name="updated_by_uid" value="{{ Auth::user()->id }}">

                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="panen-tab" data-toggle="tab" href="#panen">Hasil Panen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="kebutuhan-tab" data-toggle="tab" href="#kebutuhan">Kebutuhan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pemasukan-tab" data-toggle="tab" href="#pemasukan">Pemasukan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pengeluaran-tab" data-toggle="tab" href="#pengeluaran">Pengeluaran</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent">
                        {{-- panen --}}
                        <div class="tab-pane fade show active" id="panen">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Hasil Panen 1</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tanggal Panen</label>
                                        <input type="text" id="panen_at" name="panen_at[]" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Jumlah Panen
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="panen_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                min="1">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Panen</label>
                                        <textarea name="panen_description[]" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pemasukan</label>
                                        <input name="pemasukan_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pemasukan</label>
                                        <textarea name="pemasukan_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Hasil Panen 2</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tanggal Panen</label>
                                        <input type="text" id="panen_at" name="panen_at[]" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Jumlah Panen
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="panen_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                min="1">
                                            <div class="input-group-append">
                                                <span class="input-group-text">gram</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Panen</label>
                                        <textarea name="panen_description[]" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pemasukan</label>
                                        <input name="pemasukan_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pemasukan</label>
                                        <textarea name="pemasukan_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-link ml-auto">Tambah Hasil Panen</button>
                                </div>
                            </div>
                        </div>
                        {{-- kebutuhan --}}
                        <div class="tab-pane fade" id="kebutuhan">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Kebutuhan 1</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tipe Kebutuhan</label>
                                        <select 
                                            name="kebutuhan_type_id[]" 
                                            class="selectpicker" 
                                            data-style="form-control"
                                            data-live-search="true" 
                                            onchange=""
                                            title="Cari Jenis Kebutuhan..." 
                                            data-width="100%">
                                                @foreach ($kebutuhanTypes as $kebutuhanType)
                                                    <option value="{{ $kebutuhanType->id }}">{{ $kebutuhanType->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="kebutuhan_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                readonly
                                                min="1">
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Unknown</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pengeluaran</label>
                                        <input name="pengeluaran_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Kebutuhan 2</h6>
                                    <div class="form-group mb-2">
                                        <label for="">Tipe Kebutuhan</label>
                                        <select 
                                            name="kebutuhan_type_id[]" 
                                            class="selectpicker" 
                                            data-style="form-control"
                                            data-live-search="true" 
                                            onchange=""
                                            title="Cari Jenis Kebutuhan..." 
                                            data-width="100%">
                                                @foreach ($kebutuhanTypes as $kebutuhanType)
                                                    <option value="{{ $kebutuhanType->id }}">{{ $kebutuhanType->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <div class="input-group">
                                            <input 
                                                type="number" 
                                                name="kebutuhan_nominal[]"
                                                class="form-control" 
                                                placeholder="Masukan Jumlah"
                                                readonly
                                                min="1">
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Unknown</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Nominal Pengeluaran</label>
                                        <input name="pengeluaran_nominal[]" type="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-link ml-auto">Tambah Data Kebutuhan</button>
                                </div>
                            </div>
                        </div>
                        {{-- pemasukan --}}
                        <div class="tab-pane fade" id="pemasukan">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Pemasukan 1</h6>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <input name="pemasukan_other_nominal[]" type="number" min="1" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pemasukan</label>
                                        <textarea name="pemasukan_other_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Pemasukan 2</h6>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <input name="pemasukan_other_nominal[]" type="number" min="1" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pemasukan</label>
                                        <textarea name="pemasukan_other_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- pengeluaran --}}
                        <div class="tab-pane fade" id="pengeluaran">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Pengeluaran 1</h6>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <input name="pengeluaran_other_nominal[]" type="number" min="1" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_other_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Pengeluaran 2</h6>
                                    <div class="form-group mb-2">
                                        <label for="" class="d-flex align-items-center justify-content-between">Nominal
                                            <small class="form-text text-warning tx-10">Jika Input Data, Input ini tidak boleh kosong</small>
                                        </label>
                                        <input name="pengeluaran_other_nominal[]" type="number" min="1" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Catatan Pengeluaran</label>
                                        <textarea name="pengeluaran_other_description[]" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form> {{-- end of form --}}
            </div>
        </div>
    </div>

    {{-- modal : update status --}}
    <div class="modal fade" id="m-update-status" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data"> {{-- form --}}
                    @csrf @method('PUT')
                    <button type="submit" name="status" value="0" class="btn btn-primary">Ya, Produksi Selesai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

        $('[name="select_budidaya_id"]').on('change', function() {
            $('#select_budidaya_id').submit();
        });
        
        // INIT DATETIME PICKER
        $('#created_at, #panen_at, #done_at').datetimepicker({
            timeZone:'Asia/Jakarta',
            widgetPositioning: {
                horizontal: 'auto',
                vertical:'bottom'
            },
            minDate: moment()
        });

        // SEND KUMBUNG ID ON MODAL AFTER BUTTON CLICKED
        $('[data-send]').on('click', function() {
            $('#kumbung_id').val($(this).data('send'));
        })

        // CHANGE UNIT TYPE ON SELECT CHANGE
        $('select[name="kebutuhan_type_id[]"]').on('change', function() {
            let nearest_nominal_input = $(this).closest('.form-group').next().find('input[name="kebutuhan_nominal[]"]');
            let nearest_append_text = $(this).closest('.form-group').next().find('span.input-group-text');
            let ajax_url = `{{ route('dashboard.mitra.ajax.getKebutuhanTypeById') }}/${$(this).val()}`;
            $.ajax({
                url: ajax_url,
                success: function(result) {
                    nearest_nominal_input.removeAttr('disabled');
                    nearest_nominal_input.removeAttr('readonly');
                    nearest_append_text.html(result.data.unit);
                }
            })
        });


        // IF button[data-inputdata-production-id] CLICKED, LAUNCH MODAL INPUT DATA
        $('[data-inputdata-production-id]').on('click', function() {
            $('#m-input-data form').attr('action', `{{ route('dashboard.mitra.productions.inputdata') }}/${$(this).data('inputdata-production-id')}`);
            $('#m-input-data').modal('show');
        })

        // IF button selesaikan / button[data-updatestatus-production-id] CLICKED, LAUNCH MODAL UPDATED STATUS FOR CONFIRMATION
        $('[data-updatestatus-production-id]').on('click', function() {
            $('#m-update-status form').attr('action', `{{ route('dashboard.mitra.productions.updatestatus') }}/${$(this).data('updatestatus-production-id')}`);
            $('#m-update-status').modal('show');
        })


    </script>
@endsection {{-- section : script --}}