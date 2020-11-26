<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">ABJA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">AB<br>JA</a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      {{-- acitve --}}
      <li class="{{ Request::is('dashboard/mitra') ? 'active' : '' }}">
        <a href="#" class="nav-link"><i class="fas fa-compass tx-16"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Budidaya</li>
      <li class="{{ Request::is('dashboard/mitra/budidaya*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.mitra.budidaya.index') }}"><i class="fas fa-map"></i> <span>Tempat Budidaya</span></a>
      </li>
      <li class="{{ Request::is('dashboard/mitra/kebutuhantypes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.mitra.kebutuhantypes.index') }}"><i class="fas fa-map"></i> <span>Kebutuhan Saya</span></a>
      </li>

      @if (Request::is('dashboard/admin*'))
        <li class="menu-header">Membership</li>
        <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-users-cog"></i> <span>Mitra</span></a></li>
        <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-users"></i> <span>Administrator</span></a></li>
      @elseif (Request::is('dashboard/mitra*'))
        <li class="menu-header">Internal</li>
        <li class="{{ Request::is('dashboard/mitra/productiontypes*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.productiontypes.index') }}"><i class="fas fa-cog"></i> <span>Produksi Saya</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/productions*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.productions.index') }}"><i class="fas fa-cogs"></i> <span>Produksi</span></a>
        </li>
        <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-users"></i> <span>Pekerja</span></a></li>
        <li class="{{ Request::is('dashboard/mitra/keuangans*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.keuangans.index') }}"><i class="fas fa-money-bill-wave-alt"></i> <span>Keuangan</span></a>
        </li>            
      @endif

      <li class="menu-header">Explore</li>
      <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-newspaper"></i> <span>Berita Jamur</span></a></li>
      <li class=""><a class="nav-link" href="blank.html"><i class="fas fa-chart-bar"></i> <span>Harga Jamur</span></a></li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block">
        <i class="fas fa-question-circle"></i> Bantuan
      </a>
    </div>
  </aside>
</div>