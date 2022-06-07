<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">SIPKK</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">SK</a>
      </div>
      <ul class="sidebar-menu">


        <li class="menu-header">Dashboard</li>
        <li class="{{ Request::is('dashboard') ? 'active' : "" }}""><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        @can('admin')
        <li class="menu-header">Pengguna</li>
        <li class="{{ Request::is('daftarpengguna') ? 'active' : (Request::is('tambahpengguna') ? 'active' : (Request::is('ubahpengguna*') ? 'active' : "")) }}""><a class="nav-link" href="/daftarpengguna"><i class="fas fa-list"></i> <span>Daftar Pengguna</span></a></li>
        @endcan

        @can('admin')
        <li class="menu-header">Setup Rekening</li>
        <li class="{{ Request::is('daftarlevelsatu') ? 'active' : (Request::is('tambahlevelsatu') ? 'active' : (Request::is('ubahlevelsatu/*') ? 'active' : "")) }}""><a class="nav-link" href="/daftarlevelsatu"><i class="far fa-circle"></i><span>Level Satu</span></a></li>
        <li class="{{ Request::is('daftarleveldua') ? 'active' : (Request::is('tambahleveldua') ? 'active' : (Request::is('ubahleveldua/*') ? 'active' : "")) }}""><a class="nav-link" href="/daftarleveldua"><i class="far fa-circle"></i><span>Level Dua</span></a></li>
        <li class="{{ Request::is('daftarleveltiga') ? 'active' : (Request::is('tambahleveltiga') ? 'active' : (Request::is('ubahleveltiga/*') ? 'active' : "" )) }}""><a class="nav-link" href="/daftarleveltiga"><i class="far fa-circle"></i><span>Level Tiga</span></a></li>
        @endcan

        @can('bendahara')
        <li class="menu-header">Setup Rekening</li>
        <li class="{{ Request::is('daftarleveldua') ? 'active' : (Request::is('tambahleveldua') ? 'active' : (Request::is('ubahleveldua/*') ? 'active' : "")) }}""><a class="nav-link" href="/daftarleveldua"><i class="far fa-circle"></i><span>Level Dua</span></a></li>
        <li class="{{ Request::is('daftarleveltiga') ? 'active' : (Request::is('tambahleveltiga') ? 'active' : (Request::is('ubahleveltiga/*') ? 'active' : "" )) }}""><a class="nav-link" href="/daftarleveltiga"><i class="far fa-circle"></i><span>Level Tiga</span></a></li>
        @endcan

        @can('bendahara')
        <li class="menu-header">Sumbangan</li>
        <li class="{{ Request::is('daftarsumbangan') ? 'active' : (Request::is('bukasumbangan') ? 'active' : (Request::is('ubahsumbangan*') ? 'active' : (Request::is('daftarpenyumbang*') ? 'active' : (Request::is('tambahpenyumbang*') ? 'active' : (Request::is('ubahpenyumbang*') ? 'active' : ""))))) }}""><a class="nav-link" href="/daftarsumbangan"><i class="fas fa-list"></i> <span>Daftar Sumbangan</span></a></li>

        <li class="menu-header">Transaksi</li>
        <li class="{{ Request::is('daftartransaksi') ? 'active' : (Request::is('tambahtransaksi') ? 'active' : (Request::is('ubahtransaksi*') ? 'active' : (Request::is('posttransaksi*') ? 'active' : ""))) }}""><a class="nav-link" href="/daftartransaksi"><i class="fas fa-list"></i> <span>Daftar Transaksi</span></a></li>
        @endcan

        @can('admin')
        <li class="menu-header">Sumbangan</li>
        <li class="{{ Request::is('daftarsumbangan') ? 'active' : (Request::is('bukasumbangan') ? 'active' : (Request::is('ubahsumbangan*') ? 'active' : (Request::is('daftarpenyumbang*') ? 'active' : (Request::is('tambahpenyumbang*') ? 'active' : (Request::is('ubahpenyumbang*') ? 'active' : ""))))) }}""><a class="nav-link" href="/daftarsumbangan"><i class="fas fa-list"></i> <span>Daftar Sumbangan</span></a></li>

        <li class="menu-header">Transaksi</li>
        <li class="{{ Request::is('daftartransaksi') ? 'active' : (Request::is('tambahtransaksi') ? 'active' : (Request::is('ubahtransaksi*') ? 'active' : (Request::is('posttransaksi*') ? 'active' : ""))) }}""><a class="nav-link" href="/daftartransaksi"><i class="fas fa-list"></i> <span>Daftar Transaksi</span></a></li>
        @endcan

        @can('admin')
        <li class="menu-header">Laporan</li>
        <li class="{{Request::is('*laporan*') ? 'active' : "" }}""><a class="nav-link" href="/daftarlaporan"><i class="fas fa-list"></i> <span>Daftar Laporan</span></a></li>
        @endcan

        @can('pemantau')
        <li class="menu-header">Laporan</li>
        <li class="{{Request::is('*laporan*') ? 'active' : "" }}""><a class="nav-link" href="/daftarlaporan"><i class="fas fa-list"></i> <span>Daftar Laporan</span></a></li>
        @endcan

        @can('bendahara')
        <li class="menu-header">Laporan</li>
        <li class="{{Request::is('*laporan*') ? 'active' : "" }}""><a class="nav-link" href="/daftarlaporan"><i class="fas fa-list"></i> <span>Daftar Laporan</span></a></li>
        @endcan
    </aside>
  </div>
