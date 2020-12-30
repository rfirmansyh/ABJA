@extends('frontpage._layouts.app-frontpage')

@section('content')
    
    <section class="py-5 py-md-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <img src="{{ asset('img/frontpage/5.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-5">
                    <h4 class="text-dark font-weight-bold mb-5">Cara Kerja</h4>
                    <h5 class="text-grey font-weight-normal">Abja Sangatlah mudah untuk digunakan gunakan 3 langkah sederhana berikut</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container">
            <h5 class="text-center font-weight-bold mb-6 mb-md-10">3 Langkah Awal Cara Kerja</h5>
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/6.png') }}" alt="" style="width: 220px" class="mb-5">
                    <h5 class="text-dark font-weight-bold">Daftarkan Akun</h5>
                    <h6 class="text-grey font-weight-normal">Daftarkan diri kamu sebagai Mitra, dengan menekan tombol registrasi diatas</h6>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/7.png') }}" alt="" style="width: 220px" class="mb-5">
                    <h5 class="text-dark font-weight-bold">Masuk / Login</h5>
                    <h6 class="text-grey font-weight-normal">Masuk dengan Akun yang sudah kamu buat</h6>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/8.png') }}" alt="" style="width: 220px" class="mb-5">
                    <h5 class="text-dark font-weight-bold">Dashboard</h5>
                    <h6 class="text-grey font-weight-normal">Kamu akan dibawa ke Dashboard Abja dan dapatkan fitur hebat</h6>
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
                                    <a href="" class="btn btn-lg btn-block btn-outline-primary">Masuk</a>
                                </div>
                                <div class="col-sm-auto">
                                    <a href="" class="btn btn-lg btn-block btn-primary">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection