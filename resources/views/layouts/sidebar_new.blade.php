<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/school.jpg') }}" width="60px" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">School Tangerang</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @role(['Super Admin', 'Admin'])
        <!-- Nav Item - Charts -->
        <li @class(['nav-item',  'active fw-semibold' => Request()->is('siswa*')])>
            <a @class(['nav-link']) href="{{ route('siswa') }}">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>Data Siswa</span></a>
        </li>

        <li @class(['nav-item',  'active fw-semibold' => Request()->is('guru*')])>
            <a @class(['nav-link']) href="{{ route('guru') }}">
                <i class="fa-solid fa-person-chalkboard"></i>
                <span>Data Guru</span></a>
        </li>

        <li @class(['nav-item', 'active fw-semibold' => Request()->is('pelajaran*')])>
            <a @class(['nav-link']) href="{{ route('pelajaran') }}">
                <i class="fa-sharp fa-solid fa-book"></i>
                <span>Data Pelajaran</span></a>
        </li>

        <li @class(['nav-item', 'active fw-semibold' => Request()->is('kurikulum*')])>
            <a @class(['nav-link']) href="{{ route('kurikulum') }}">
                <i class="fa-sharp fa-solid fa-book"></i>
                <span>Data Kurikulum</span></a>
        </li>

        <li @class(['nav-item', 'active fw-semibold' => Request()->is('jadwal*')])>
            <a @class(['nav-link']) href="{{ route('jadwal') }}">
                <i class="fa-sharp fa-regular fa-business-time"></i>
                <span>Data Jadwal</span></a>
        </li>

        <li @class(['nav-item', 'active fw-semibold' => Request()->is('user*')])>
            <a @class(['nav-link']) href="{{ route('user') }}">
                <i class="fa-solid fa-user"></i>
                <span>Data User</span></a>
        </li>
    @endrole
</ul>
<!-- End of Sidebar -->
