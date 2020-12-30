@extends('frontpage._layouts.app-frontpage')

@section('content')
    
    <section class="py-5 py-md-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h4 class="text-dark font-weight-bold mb-5"><span class="text-primary">ABJA</span>. sebuah penyedia layanan Sistem Informasi Bagai para Mitra Budidaya Jamur</h4>
                    <h5 class="text-grey font-weight-normal">Misi kami meningkatkan produktifitas, mempermudah, pemantaun pada budidaya, hasil panen, produksi, dan masih banyak lagi</h5>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/frontpage/3.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset('img/frontpage/4.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-5">
                    <h4 class="text-dark font-weight-bold">Tentang <span class="text-primary">ABJA</span></h4>
                    <div class="divider-small my-5"></div>
                    <h6 class="text-grey font-weight-normal">Abja Berasal dari permasalahan yang timbul dari salah satu Mitra Budidaya jamur yang memiliki banyak tempat budidaya, sehingga cukup kesusahan dalam melakukan tracking produksi dan hasil panen.</h6>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('img/frontpage/svg/1.svg') }}" alt="" class="w-100">
                </div>
                <div class="col-lg-5">
                    <h4 class="text-dark font-weight-bold">Target Utama<span class="text-primary">ABJA</span></h4>
                    <div class="divider-small my-5"></div>
                    <h6 class="text-grey font-weight-normal">ABJA didesain untuk Mereka para mitra Budidaya Jamur yang ingin meningkatkan ketelitian dalam setiap hasil panen, pemasukan, pengeluaran, serta management Budidaya Jarak Jauh</h6>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container">
            <h5 class="text-center font-weight-bold mb-6 mb-md-10">Kenapa Harus Menggunakan <span class="text-primary">ABJA ?</span></h5>
            <div class="row justify-content-around">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/svg/3.svg') }}" alt="" class="img-fluid mb-5">
                    <h5 class="text-dark font-weight-bold">Olah Budidaya</h5>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/svg/4.svg') }}" alt="" class="img-fluid mb-5">
                    <h5 class="text-dark font-weight-bold">Olah Produksi</h5>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/svg/5.svg') }}" alt="" class="img-fluid mb-5">
                    <h5 class="text-dark font-weight-bold">Olah Keuangan</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container">
            <div class="card border border border-3 border-primary rounded-md">
                <div class="card-body">
                    <div class="row align-items-center text-center text-lg-left">
                        <div class="col-lg mb-4 mb-lg-0">
                            <h5 class="text-dark font-weight-bold">Tertarik Dengan ABJA ?</h5>
                            <h6 class="text-grey font-weight-normal">Yuk Jadi Bagian dari Mitra Kami</h6>
                        </div>
                        <div class="col-lg-auto">
                            <div class="row align-items-center justify-content-center gutter-xs">
                                <div class="col-sm-auto mb-3 mb-sm-0">
                                    <a href="" class="btn btn-lg btn-block btn-outline-primary">Cara Kerja</a>
                                </div>
                                <div class="col-sm-auto">
                                    <a href="" class="btn btn-lg btn-block btn-primary">Bergabung Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection