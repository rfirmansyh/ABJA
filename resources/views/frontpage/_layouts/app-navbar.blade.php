<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">ABJA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('frontpage.home') }}">
                    BERANDA
                </a>
                <a class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('frontpage.about') }}">
                    TENTANG
                </a>
                <a class="nav-item nav-link {{ Request::is('carakerja') ? 'active' : '' }}" href="{{ route('frontpage.carakerja') }}">
                    CARA KERJA
                </a>
                <a class="btn btn-outline-primary mr-3" href="{{ route('login') }}">MASUK</a>
                <a class="btn btn-primary" href="{{ route('register') }}">REGISTRASI</a>
            </div>
        </div>
    </div>
</nav>