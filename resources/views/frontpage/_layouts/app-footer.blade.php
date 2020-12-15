<footer>
    <div class="container">
        <div class="row py-10">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h1 class="text-primary font-weight-extrabold">ABJA</h1>
                <div class="divider-small mb-5"></div>
                <p class="text-font">Jalan. Kalimantan No. 37, Kampus Tegalboto, Jember, Jawa Timur, 68121, Indonesia</p>

                <h5 class="text-font">Ikuti Kami</h5>
                <p><i class="fab fa-instagram"></i> <span >@abjaid</span></p>
            </div>
            <div class="col-md-6 col-lg-4 pt-lg-4 pl-lg-5 mb-5 mb-md-0">
                <h5 class="text-font font-weight-bold mb-4">NAVIGASI</h5>
                <ul class="nav d-flex flex-column">
                    <li class="nav-item nav-link mb-2 pl-0"><a href="" class="text-font font-weight-normal">BERANDA</a></li>
                    <li class="nav-item nav-link mb-2 pl-0"><a href="" class="text-font font-weight-normal">TENTANG</a></li>
                    <li class="nav-item nav-link mb-2 pl-0"><a href="" class="text-font font-weight-normal">CARA KERJA</a></li>
                    <li class="nav-item nav-link mb-2 pl-0"><a href="" class="text-font font-weight-normal">BERITA</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-font font-weight-bold mb-4">BERITA TERBARU</h5>
                @for ($i = 0; $i < 3; $i++)
                <div class="row align-items-center gutters-xs mb-3">
                    <div class="col-auto">
                        <div class="card card-post-small">
                            <div class="card-body">
                                <div class="card-post-img">
                                    <img src="{{ asset('img/budidaya/1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <p class="text-font font-weight-bold mb-2">Jember Tempat Pengolahan...</p>
                        <span class="text-sm text-muted">2 Jan 2020</span>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <p class="py-5 border-top text-grey text-center ">&copy; Copyright 2020. ABJA</p>
    </div>
</footer>