<nav id="sidebarMenu" class="sidebar d-lg-block bg-white text-dark collapse shadow-sm " data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div class="user-card d-flex d-md-none align-items-center justify-content-end justify-content-md-center pb-4">
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <i class="lni lni-close"></i>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <a class="navbar-brand mt-3 mb-4" href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('admin/assets/img/logo/logo.png') }}" class="w-75 h-75" alt="Logo" />
            </a>

            <li class="nav-item">
                <a href="{{ url('/admin/dashboard') }}"
                    class="nav-link-new {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="lni lni-dashboard"></i>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/profile') }}"
                    class="nav-link-new {{ $title == 'Profile' ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="lni lni-user me-2"></i>
                    </span>
                    <span class="sidebar-text">Profile</span>
                </a>
            </li>

            @if (auth()->user()->is_admin == true)
                <li class="nav-item">
                    <a href="{{ url('/admin/manage-user') }}"
                        class="nav-link-new {{ $title == 'Manage User' ? 'active' : '' }}">
                        <span class="sidebar-icon">
                            <i class="lni lni-users me-2"></i>
                        </span>
                        <span class="sidebar-text">Manage User</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->is_admin == true)
                <li class="nav-item">
                    <div class="nav-link-new {{ $title == 'Berita' || $title == 'Kategori Berita' ? 'active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#submenu-app" style="cursor: pointer;">
                        <span class="sidebar-icon">
                            <i class="lni lni-paperclip me-2"></i>
                            <span class="sidebar-text">Berita</span>
                        </span>
                        <i class="lni lni-chevron-down ms-4"></i>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a class="nav-link-new " href="{{ url('/admin/kategori-berita') }}">
                                    <i class="lni lni-grid-alt me-2"></i>
                                    <span class="sidebar-text text-sub">Kategori</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-new " href="{{ url('/admin/berita') }}">
                                    <i class="lni lni-comments-reply me-2"></i>
                                    <span class="sidebar-text text-sub">Isi Berita</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif


            <li class="nav-item">
                <div class="nav-link-new {{ $title == 'Pemilih' ? 'active' : '' }}{{ $title == 'Masyarakat' ? 'active' : '' }}{{ $title == 'Keluarga' ? 'active' : '' }}{{ $title == 'List Agama' ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#masyarakat" style="cursor: pointer;">
                    <span class="sidebar-icon">
                        <i class="lni lni-consulting me-2"></i>
                        <span class="sidebar-text">Data Masyarakat</span>
                    </span>
                    <i class="lni lni-chevron-down ms-4"></i>
                </div>

                <div class="multi-level collapse" role="list" id="masyarakat" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link-new " href="{{ url('/admin/masyarakat') }}">
                                <i class="lni lni-database me-2"></i>
                                <span class="sidebar-text text-sub">Penduduk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-new " href="{{ url('/admin/keluarga') }}">
                                <i class="lni lni-agenda me-2"></i>
                                <span class="sidebar-text text-sub">Keluarga</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-new" href="{{ url('/admin/pemilih') }}">
                                <i class="lni lni-grid-alt me-2"></i>
                                <span class="sidebar-text text-sub">Calon Pemilih</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-new" href="{{ url('/admin/list-agama') }}">
                                <i class="lni lni-grid-alt me-2"></i>
                                <span class="sidebar-text text-sub">List Agama</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <div class="nav-link-new {{ $title == 'Dana' ? 'active' : '' }}{{ $title == 'Dana Masuk' ? 'active' : '' }}{{ $title == 'Dana Keluar' ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#submenu-pages" style="cursor: pointer;">
                    <span class="sidebar-icon">
                        <i class="lni lni-layers me-2"></i>
                        <span class="sidebar-text">Dana Desa</span>
                    </span>

                    <i class="lni lni-chevron-down ms-4"></i>
                </div>

                <div class="multi-level collapse" role="list" id="submenu-pages" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link-new" href="{{ url('/admin/dana') }}">
                                <i class="lni lni-wallet me-2"></i>
                                <span class="sidebar-text text-sub">Data Dana</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-new" href="{{ url('/admin/dana_masuk') }}">
                                <i class="lni lni-exit-down me-2"></i>
                                <span class="sidebar-text text-sub">Dana Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-new" href="{{ url('/admin/dana_keluar') }}">
                                <i class="lni lni-exit-up me-2"></i>
                                <span class="sidebar-text text-sub">Dana Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link-new">
                    <span class="sidebar-icon">
                        <ion-icon name="home-outline" class=" me-2"></ion-icon>
                    </span>
                    <span class="sidebar-text"> Ke LandingPage</span>
                </a>
            </li>

            </li>
            <li class="nav-item">
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <a href=""
                        class="btn btn-blue d-flex align-items-center justify-content-center btn-upgrade-pro">
                        <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                            <i class="lni lni-power-switch me-2 fw-bold"></i>
                        </span>
                        <span>

                            <button type="submit" class="btn btn-transparent text-white btn-hover"> Keluar</button>
                        </span>
                    </a>
                </form>
            </li>

        </ul>
    </div>
</nav>
