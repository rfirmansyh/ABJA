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
      @if (Request::is('dashboard/admin*'))
        <li class="{{ Request::is('dashboard/admin') ? 'active' : '' }}">
          <a href="{{ route('dashboard.admin.index') }}" class="nav-link"><i class="fas fa-compass tx-16"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Membership</li>
        <li class="{{ Request::is('dashboard/admin/users*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.admin.users.index') }}"><i class="fas fa-users-cog"></i> <span>Mitra</span></a>
        </li>
        <li class="menu-header">Informasi</li>
        <li class="{{ Request::is('dashboard/admin/posts*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.admin.posts.index') }}"><i class="fas fa-newspaper"></i> <span>Berita Jamur</span></a>
        </li> 
      @elseif (Request::is('dashboard/mitra*'))
        <li class="{{ Request::is('dashboard/mitra') ? 'active' : '' }}">
          <a href="{{ route('dashboard.mitra.index') }}" class="nav-link"><i class="fas fa-compass tx-16"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Internal</li>
        <li class="{{ Request::is('dashboard/mitra/budidaya*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.budidaya.index') }}"><i class="fas fa-map"></i> <span>Tempat Budidaya</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/kumbung*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.kumbung.index') }}"><i class="fas fa-warehouse"></i> <span>Kumbung Saya</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/kebutuhantypes*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.kebutuhantypes.index') }}"><i class="fas fa-hands"></i> <span>Kebutuhan Saya</span></a>
        </li>
        <li class="menu-header">Budidaya</li>
        <li class="{{ Request::is('dashboard/mitra/productiontypes*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.productiontypes.index') }}"><i class="fas fa-cog"></i> <span>Produksi Saya</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/productions*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.productions.index') }}"><i class="fas fa-cogs"></i> <span>Produksi</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/pekerjas*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.pekerjas.index') }}"><i class="fas fa-users"></i> <span>Pekerja</span></a>
        </li>
        <li class="{{ Request::is('dashboard/mitra/keuangans*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.keuangans.index') }}"><i class="fas fa-money-bill-wave-alt"></i> <span>Keuangan</span></a>
        </li>
        <li class="menu-header">Explore</li>
        <li class="{{ Request::is('dashboard/mitra/posts*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.mitra.posts.index') }}"><i class="fas fa-newspaper"></i> <span>Berita Jamur</span></a>
        </li>      
      @elseif(Request::is('dashboard/pekerja*'))      
        <li class="{{ Request::is('dashboard/pekerja') ? 'active' : '' }}">
          <a href="{{ route('dashboard.mitra.index') }}" class="nav-link"><i class="fas fa-compass tx-16"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Aktifitas</li>
        <li class="{{ Request::is('dashboard/pekerja/productions*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.pekerja.productions.index') }}"><i class="fas fa-cogs"></i> <span>Produksi</span></a>
        </li>
        <li class="menu-header">Explore</li>
        <li class="{{ Request::is('dashboard/pekerja/posts*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard.pekerja.posts.index') }}"><i class="fas fa-newspaper"></i> <span>Berita Jamur</span></a>
        </li> 
      @endif

    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block">
        <i class="fas fa-question-circle"></i> Bantuan
      </a>
    </div>
  </aside>
</div>