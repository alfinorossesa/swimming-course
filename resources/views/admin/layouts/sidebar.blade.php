<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo/swimming.png') }}" alt="" width="60px">
        </div>
    </a>
    <div class="mt-1 mb-3"></div>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('beranda') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
        </a>
    </li>

    @if (auth()->user()->username == 'admin')
        <li class="nav-item {{ request()->is('data-admin*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('data-admin.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Olah Data Admin</span>
            </a>
        </li>
    @endif

    <li class="nav-item {{ request()->is('data-pelatih*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-pelatih.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Pelatih</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('data-siswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-siswa.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Siswa</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('data-pembayaran*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-pembayaran.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Pembayaran</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('data-informasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-informasi.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Informasi</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('data-jadwal-latihan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-jadwal-latihan.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Jadwal Latihan</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('data-perkembangan-siswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data-perkembangan-siswa.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Olah Data Perkembangan Siswa</span>
        </a>
    </li>

</ul>