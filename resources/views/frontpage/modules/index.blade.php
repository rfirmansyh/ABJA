@extends('frontpage._layouts.app-frontpage')

@section('content')
    
    <section class="py-5 py-md-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('img/frontpage/1.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 pl-lg-5">
                    <h4 class="text-dark font-weight-bold mb-5">Solusi Tepat Bagi Budidaya Jamur diseluruh Indonesia</h4>
                    <h5 class="text-grey font-weight-normal">Dapatkan Sebuah Sistem yang dapat membantu dalam pengolahan budidaya kamu dengan cara yang luar biasa.</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h4 class="text-dark font-weight-bold">Fitur Unggulan <span class="text-primary">ABJA</span></h4>
                    <div class="divider-small my-5"></div>
                    <h5 class="text-grey font-weight-normal">Abja dibuat untuk mempermudah Mitra Budidaya Jamur yang belum pernah ada Selama ini !</h5>
                </div>
                <div class="col-sm-8 col-lg-4 offset-lg-1 order-1 order-lg-2">
                    <img src="{{ asset('img/frontpage/2.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container">
            <h5 class="text-center font-weight-bold">Kenapa Harus Menggunakan <span class="text-primary">ABJA ?</span></h5>
            <div class="row justify-content-around">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/svg/1.svg') }}" alt="" class="img-fluid">
                    <h5 class="text-dark font-weight-bold">Dapatkan Hasil Terbaik</h5>
                    <h6 class="text-grey font-weight-normal">Dengan Abja kamu dapat mencatat semua Kebutuhan Budidaya kamu, mulai dari Produksi, Keuangan, Budidaya, dan masih banyak lagi.</h6>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('img/frontpage/svg/2.svg') }}" alt="" class="img-fluid">
                    <h5 class="text-dark font-weight-bold">Pantau Produksi Dimana Saja</h5>
                    <h6 class="text-grey font-weight-normal">Tetap Pantau Produksi Kamu walau kamu tidak berada ditempat, bahkan kamu bisa Menambahkan pekerja. </h6>
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
                                    <a href="" class="btn btn-lg btn-block btn-outline-primary">Explore</a>
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

    <section class="py-10">
        <div class="container">
            <h5 class="text-center font-weight-bold mb-6">Testimonial Pengguna <span class="text-primary">ABJA ?</span></h5>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card py-5 card-testi shadow-smooth">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="card-testi-img mx-auto mb-4">
                                <img src="{{ asset('img/users/2.jpg') }}" alt="">
                            </div>
                            <h6 class="font-weight-bold mb-4">Mbak Yayuk</h6>
                            <p class="text-grey text-center font-weight-normal">Ini Luar Biasa ! ABJA membantu saya Mengolah Budidaya Saya, sehingga Hasil Panen dan Pendapata Maupun Pengeluaran  Dapat Terpantau !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card py-5 card-testi shadow-smooth">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="card-testi-img mx-auto mb-4">
                                <img src="{{ asset('img/users/2.jpg') }}" alt="">
                            </div>
                            <h6 class="font-weight-bold mb-4">Mbak Yayuk</h6>
                            <p class="text-grey text-center font-weight-normal">Ini Luar Biasa ! ABJA membantu saya Mengolah Budidaya Saya, sehingga Hasil Panen dan Pendapata Maupun Pengeluaran  Dapat Terpantau !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection