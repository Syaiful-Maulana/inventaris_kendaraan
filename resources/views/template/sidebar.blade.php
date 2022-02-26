<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">DISDIKBUD</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">DB</a>
      </div>
      <ul class="sidebar-menu">

          <li class="menu-header">Dashboard</li>
          <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}" >
            <a href="{{ url('dashboard')}}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          @if (auth()->user()->level=="admin")
          <li class="menu-header">Data Master</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('pegawai')}}">Pegawai</a></li>
              <li><a class="nav-link" href="{{ url('kendaraan')}}">Kendaraan</a></li>
            </ul>
          </li>
          @endif
          <li class="menu-header">Operasional</li>
          @if ((auth()->user()->level=="admin"))
          <li class="{{ request()->is('servisAdmin*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('servisAdmin')}}"><i class="far fa-square"></i> <span>Servis</span></a></li>
          <li class="{{ request()->is('pinjamAdmin*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pinjamAdmin')}}"><i class="far fa-square"></i> <span>Pinjam</span></a></li>
              
          @endif
          @if ((auth()->user()->level=="user"))
          
          <li class="{{ request()->is('servis*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('servis')}}"><i class="far fa-square"></i> <span>Servis</span></a></li>
          <li class="{{ request()->is('pinjam*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pinjam')}}"><i class="far fa-square"></i> <span>Pinjam</span></a></li>
              
          @endif
          @if ((auth()->user()->level=="admin"))
              
          <li class="menu-header">Rekap Data</li>

          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Rekap Data </span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('rekapServis')}}">Rekap Servis</a></li>
              <li><a class="nav-link" href="{{ url('rekapPinjam')}}">Rekap Peminjaman</a></li>
            </ul>
          </li>
          @endif


    </aside>
  </div>