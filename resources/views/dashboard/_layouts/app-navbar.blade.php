<nav class="navbar navbar-expand-lg main-navbar justify-content-between">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex align-items-center">
            <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;" class="mr-3">
                <img alt="image" src="{{ asset('storage/'.Auth::user()->photo) }}" style="width: 100%; height: 100%; object-fit: cover">
            </div>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>

            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Akun</div>

            @if (Request::is('dashboard/admin*'))
                <a href="{{ route('dashboard.admin.profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>                
            @elseif (Request::is('dashboard/mitra*'))
                <a href="{{ route('dashboard.mitra.profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>                
            @else
                <a href="{{ route('dashboard.pekerja.profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>                
            @endif

            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger d-flex align-items-center">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            </div>
        </li>
    </ul>
</nav>