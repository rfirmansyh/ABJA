@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')
@section('header', 'Produksi')

@section('breadcrumb') {{-- section : breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Produksi</a></div>
@endsection {{-- section : breadcrumb --}}

@section('content-header') {{-- section : content-header --}}
  <div class="row align-items-center">
		<div class="col-md"><h2 class="section-title">Produksi Kumbung/Rumah Jamur</h2></div>
  </div>
@endsection {{-- section : content-header --}}

@section('content') {{-- section : content --}}

    {{-- if widget added --}}
    {{-- end of if widget added --}}

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
                                <div class="col-lg-auto">
                                    <div id="img-card">
                                        <img src="{{ asset('img/kumbung/default-kumbung.png') }}" alt="">
									</div>
                                </div>
                                <div class="col-lg">
                                    <div class="border-bottom mb-1 pb-1">Di Produksi Oleh :
                                        <div class="font-weight-bold">
                                            @if (count($kumbung->productions) != 0)
                                                {{ $kumbung->productions()->orderBy('id', 'desc')->first()->user->name }}    
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
                                    <button data-production-id="{{ $kumbung->productions()->orderBy('id', 'desc')->first()->id }}" class="btn btn-block h-100 btn-outline-dark">Input Data</button>
                                </div>
                                @endif
                                <div class="col-sm">
                                    @if ($progress && $progress->percentage < 100)
                                        <button class="btn btn-block h-100 btn-secondary" disabled>Konfirmasi</button>    
                                    @elseif ($progress && $progress->percentage == 100)
                                        <button class="btn btn-block h-100 btn-success">Konfirmasi</button>   
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

    
@endsection {{-- section : content --}}

@section('modal') {{-- section : modal --}}
    {{-- modal : production-start --}}
    <div class="modal fade" id="m-production-start" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Kebutuhan</a>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="form-group mb-2">
                            <label for="">Deskripsi produksi</label>
                            <textarea name="description" id="" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Nama produksi</label>
                            <select name="production_type_id" class="custom-select">
                                @foreach ($productionTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Kumbung ID</label>
                            <input type="text" id="kumbung_id" name="kumbung_id" value="" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Dibuat Oleh</label>
                            <input type="text" id="updated_by_uid" name="updated_by_uid" value="{{ Auth::user()->id }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="tab-pane fade" style="max-height: 420px; overflow-y: auto; overflow-x: hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h6>Kebutuhan 1</h6>
                        <div class="form-group mb-2">
                            <label for="">Tipe Kebutuhan</label>
                            <select 
                                name="kebutuhanType_id[]" 
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
                            <label for="">Nominal</label>
                            <div class="input-group">
                                <input 
                                    type="number" 
                                    name="kebutuhanType_nominal[]"
                                    class="form-control" 
                                    placeholder="Masukan Jumlah"
                                    disabled>
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
                            <textarea name="pengeluaran_description[]" id="" class="form-control" rows="3"></textarea>
                        </div>
                        <h6>Kebutuhan 2</h6>
                        <div class="form-group mb-2">
                            <label for="">Tipe Kebutuhan</label>
                            <select 
                                name="kebutuhanType_id[]" 
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
                            <label for="">Nominal</label>
                            <div class="input-group">
                                <input 
                                    type="number" 
                                    name="kebutuhanType_nominal[]"
                                    class="form-control" 
                                    placeholder="Masukan Jumlah"
                                    disabled>
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
                            <textarea name="pengeluaran_description[]" id="" class="form-control" rows="3"></textarea>
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
        $('#created_at').datetimepicker({
            timeZone:'Asia/Jakarta',
            widgetPositioning: {
                horizontal: 'auto',
                vertical:'bottom'
            }
        });
        $('#done_at').datetimepicker({
            timeZone:'Asia/Jakarta',
            widgetPositioning: {
                horizontal: 'auto',
                vertical:'bottom'
            }
        });

        $('[data-send]').on('click', function() {
            $('#kumbung_id').val($(this).data('send'));
        })

        $('select[name="kebutuhanType_id[]"]').on('change', function() {
            let nearest_nominal_input = $(this).closest('.form-group').next().find('input[name="kebutuhanType_nominal[]"]');
            let nearest_append_text = $(this).closest('.form-group').next().find('span.input-group-text');
            let ajax_url = `{{ route('dashboard.mitra.ajax.getKebutuhanTypeById') }}/${$(this).val()}`;
            $.ajax({
                url: ajax_url,
                success: function(result) {
                    nearest_nominal_input.removeAttr('disabled');
                    nearest_append_text.html(result.data.unit);
                }
            })
        })

        // function getDate(el) {
        //     let data = new Date($(el).data('DateTimePicker').date());
        //     $(el).val(data);
        //     // let newData = new Date();
        //     // newData.setDate(data.getDate()+2);
        //     // console.log(newData);
        // }
    </script>
@endsection {{-- section : script --}}