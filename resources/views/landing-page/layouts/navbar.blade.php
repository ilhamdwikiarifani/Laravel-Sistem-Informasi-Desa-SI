<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @auth
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Selamat Datang, {{ auth()->user()->username }} >>
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    Harap Login >>
                                </div>
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ url('/login') }}">Login</a>
                                    </li>
                                </ul>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('landing-page/assets/images/logo/logo.png') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->

                    <!-- End Main Menu Search -->
                </div>
                {{-- <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-map"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-grid-alt"></i>
                                    <span class="total-items">2</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    {{-- <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-scroll-down"></i></span>
                    </div> --}}
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">


                                <li class="nav-item">
                                    <a href="{{ url('/') }}" aria-label="Toggle navigation">Utama</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/profil-desa') }}" aria-label="Toggle navigation">Profil
                                        Desa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/berita') }}" aria-label="Toggle navigation">Berita</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Pemerintahan</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="{{ url('/struktur-pemerintahan') }}">Struktur
                                                Pemerintahan</a></li>
                                        <li class="nav-item"><a href="{{ url('/visi-misi') }}">Visi &
                                                Misi</a></li>
                                        <li class="nav-item"><a href="{{ url('/dana') }}">Dana</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Lainnya</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="{{ url('/about') }}">Tentang</a></li>
                                        <li class="nav-item"><a href="{{ url('/contact') }}">Hubungi</a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class="nav-item">
                                        <a href="" aria-label="Toggle navigation">Inventaris</a>
                                    </li> --}}

                                {{-- <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Data Desa</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="index.php?page=datapenduduk">Data Penduduk</a>
                                            </li>
                                            <li class="nav-item"><a href="index.php?page=datakeluarga">Data Keluarga</a></li>
                                            <li class="nav-item"><a href="index.php?page=datadusun">Data Dusun</a></li>
                                        </ul>
                                    </li> --}}

                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Ikuti Kami:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>
<!-- End Header Area -->
