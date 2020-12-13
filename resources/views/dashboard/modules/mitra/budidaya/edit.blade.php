@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Tambah Tempat Budidaya Saya')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Tempat Budidaya</a></div>
    <div class="breadcrumb-item">Ubah Tempat Budidaya</div>
@endsection
@section('content-header')
  <div class="row align-items-center">
        <div class="col-md"><h2 class="section-title">Form Ubah Tempat Budidaya</h2></div>
        <div class="col-md-auto">
            <a href="{{ route('dashboard.mitra.budidaya.index') }}" class="btn btn-block btn-lg btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i> Data Semua Budidaya</a>
        </div>
  </div>
@endsection

@section('content')

    <form action="{{ route('dashboard.mitra.budidaya.update', $budidaya->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Foto Tempat</label>
                        <div class="custom-file">
                            <input 
                                type="file" 
                                name="photo"
                                id="customFile" onchange="openFile(event, '#img-budidaya')"
                                class="custom-file-input" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Tempat</label>
                        <input 
                            type="text" 
                            name="name"
                            value="{{ old('name') ? old('name') : $budidaya->name }}"
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Contoh : Budidaya Jamur Sumber Jaya Jember">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Luas</label>
                        <div class="input-group mb-3">
                            <input 
                                type="number"
                                step="0.01" 
                                name="large"
                                value="{{ old('large') ? old('large') : $budidaya->large }}"
                                class="form-control @error('large') is-invalid @enderror" 
                                placeholder="Masukan Luas">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">M2</span>
                            </div>
                            @error('large')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Status Tempat</label>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ ($budidaya->status == 1) ? 'checked' : "" }}
                                type="radio" 
                                name="status"
                                value="1"
                                id="aktif" 
                                class="custom-control-input @error('status') is-invalid @enderror">
                            <label class="custom-control-label text-success font-weight-bold" for="aktif">Aktif</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input 
                                {{ ($budidaya->status == 0) ? 'checked' : "" }}
                                type="radio" 
                                name="status"
                                value="0"
                                id="nonaktif" 
                                class="custom-control-input @error('status') is-invalid @enderror">
                            <label class="custom-control-label text-gray font-weight-bold" for="nonaktif">Nonaktif</label>
                        </div>
                        @error('status')
                            <span class="tx-12 text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Saat Ini</label>
                        <div class="card bg-light shadow-none">
                            <div class="card-body">
                                {{ $budidaya->detail_address }}, 
                                {{ $budidaya->kelurahan }} - 
                                {{ $budidaya->kecamatan }} - 
                                {{ $budidaya->kabupaten }} - 
                                {{ $budidaya->provinsi }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Ganti Alamat</label>
                        <select 
                            data-location="provinsi" name="provinsi"
                            class="custom-select">
                                <option selected disabled>Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kabupaten" name="kabupaten" 
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kota/Kabupaten</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kecamatan" name="kecamatan"
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <select 
                            data-location="kelurahan" name="kelurahan"
                            class="custom-select" disabled>
                                <option selected disabled>Pilih Kelurahan</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Ganti Detail Alamat</label>
                        <textarea 
                            name="detail_address" 
                            class="form-control" 
                            style="min-height: 100px">{{ old('detail_address') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary ml-auto d-block">Ubah</button>          
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="img-card">
                        <img src="{{ asset('storage/'.$budidaya->photo) }}" class="img-fluid" id="img-budidaya">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="font-weight-bold">Pekerja</h6>
                    @if ($budidaya->maintenance_by)
                    <div class="row">
                        <div class="col-md-auto mb-4">
                            <div class="img-profile img-profile-sm shadow-light p-3">
                                <img src="{{ asset('storage/'.$budidaya->maintenance_by->photo) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="tx-14 font-weight-bolder">{{ $budidaya->maintenance_by->name }}</div>
                            <p class="">{{ $budidaya->maintenance_by->phone }}</p>
                            <div class="border-bottom mb-1 pb-1">Tanggal Bergabung :
                                <div class="font-weight-bold">{{ $budidaya->maintenance_by->created_at }}</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-light text-center p-5 rounded-lg mb-4">
                        Tidak Ada Pekerja
                    </div>
                    @endif

                    <div class="row justify-content-end gutters-xs">
                        <div class="col-auto">
                            <button type="button" data-toggle="collapse" data-target="#c-option" class="btn btn-link text-muted">Opsi Pekerja</button>
                        </div>
                    </div>

                    <div class="collapse" id="c-option">
                        @if ($budidaya->maintenance_by)
                            <div class="row justify-content-end gutters-xs">
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                                </div>
                                <div class="col-auto">
                                    <form action="{{ route('dashboard.mitra.budidaya.maintener.destroy', $budidaya->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Berhentikan Pekerja</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-end gutters-xs">
                                <div class="col-auto">
                                    <button type="button" onclick="showDisplay('#crd-pekerja')" class="btn btn-outline-primary">Tambah Pekerja</button>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            {{-- ganti pekerja on click --}}
            <div class="card d-none" id="crd-pekerja">
                <div class="card-body">
                    <h6 class="font-weight-bold">Tambah Pekerja</h6>
                    <select 
                        onchange="selectShowMaintenerById(event, '#d-maintener')"
                        name="maintenance_by_uid" 
                        id="select-maintener"
                        class="selectpicker" 
                        data-live-search="true" 
                        title="Cari Pekerja..." 
                        data-width="100%">
                            @foreach ($mainteners as $maintener)
                                <option value="{{ $maintener->id }}">{{ $maintener->name }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            {{-- detail maintener : state d-none --}}
            <div class="card d-none" id="d-maintener">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-bold">Detail Maintener</h6>
                        <div class="csr-pointer" onclick="elDisappearResetSelect(event, '#d-maintener', '#select-maintener')">&times;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="img-profile img-profile-sm shadow-light p-3">
                                <img src="" alt="" data-to-fill="maintener-img">
                            </div>
                        </div>
                        <div class="col-md">
                            <div data-to-fill="maintener-name" class="tx-14 font-weight-bolder"></div>
                            <p data-to-fill="maintener-phone" class=""></p>
                            <div class="border-bottom mb-1 pb-1">Menjadi Pekerja Sejak :
                                <div data-to-fill="maintener-started-at" class="font-weight-bold"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </form>     
    
@endsection

@section('style')
    <style>
        #img-card {
            width: 100%;
            height: 320px;
            overflow: hidden;
            border-radius: 5px;
            display: flex; align-items: center; justify-content: center;
            position: relative;
        }
        #img-card::before {
            content: 'No Image Upload';
            display: inline-block;
            position: absolute;
        }
        #img-card img {
            position: relative;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let selectShowMaintenerById = function(event, target_id) {
            let id = $(event.target).val();
            $.ajax({
                url: `{{ route("dashboard.mitra.ajax.users.show") }}/${id}`,
                success: function(result) {
                    console.log(result);
                    let el = $(target_id);
                    el.removeClass('d-none');
                    el.find('[data-to-fill="maintener-img"]').attr('src', `{{ asset('storage/') }}/${result.data.photo}`);
                    el.find('[data-to-fill="maintener-name"]').html(result.data.name);
                    el.find('[data-to-fill="maintener-phone"]').html(result.data.phone);
                    el.find('[data-to-fill="maintener-started-at"]').html(result.data.created_at);
                }
            })
            event.preventDefault();
        }

        let showDisplay = function(target_id) {
            $(target_id).removeClass('d-none');
        }
        let hideDisplay = function(target_id) {
            $(target_id).addClass('d-none');
        }

        let elDisappearResetSelect = function(event, id_el, id_select) {
            $(id_el).addClass('d-none');
            $(id_select).selectpicker('val', '');
            event.preventDefault();
        }
        let dangerAlert = function() {
            Swal.fire({
                title: 'Berhentikan Pekerja ?',
                text: "Apa anda yakin memberhentikan pekerja terkait !",
                icon: 'danger',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Ya, Berhentikan Pekerja!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-danger mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(this);
                        $('#crd-pekerja').removeClass('d-none');
                    }   
                })
        }
    </script>
@endsection