@extends('landing-page.layouts.main')

@section('content')
<!-- Start Hero Area -->
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 custom-padding-right">
                <div class="slider-head">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider">
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-image: url({{ asset('landing-page/assets/images/hero/slide1.png') }});">
                            <div class="content">
                                <h2><span class="text-dark">Sebanyak 452 KPM Warga Desa muara</span>
                                    Mendapatkan Bantuan langsung Tunai Tahap ll Kemesos RI
                                </h2>
                                <p class="text-dark">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod
                                    tempor incididunt ut
                                    labore dolore magna aliqua.</p>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-image: url({{ asset('landing-page/assets/images/hero/slide2.png') }});">
                            <div class="content">
                                <h2><span class="text-dark">Warga Desa Muara Mulai Mendapatkan</span>
                                    Bantuan Langsung Tunai dari BLT Desa Muara.
                                </h2>
                                <p class="text-dark">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod
                                    tempor incididunt ut
                                    labore dolore magna aliqua.</p>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner" style="background-color:#eaeaea;">
                            <div class="content">
                                <h2 class="titleKD ">
                                    <span>Smart Desa Digital </span>
                                    Demi Kemajuan Desa
                                </h2>
                                <h6 class="text-blue mt-1"> ~ Kepala Desa</h6>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner style2">
                            <div class="content">
                                <h2>Data Inventaris !</h2>
                                <p>Saving up to 50% off all online store items this week.</p>
                                <div class="button">
                                    <a class="btn" href="index.php?page=inventaris">Visit site</a>
                                </div>
                            </div>
                        </div>
                        <!-- Start Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Banner Area -->
<section class="banner section ">
    <div class="container">
        <div class="row">
            <div class=" col-12">
                <blockquote>
                    <div class="icon">
                        <i class="lni lni-quotation"></i>
                    </div>
                    <h4>"Demi Terciptanya Kualitas Pelayanan Publik Yang Cepat, Dan Efektif Desa Kini Menghadirkan
                        Aplikasi Smart Desa Digital Untuk Informasi Dan Pelayanan Digital."</h4>
                    <span>- Setya, Kepala Desa</span>
                </blockquote>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Shipping Info -->
<section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-user"></i>
                </div>
                <div class="media-body">
                    <h5>{{ $masyarakat }}+</h5>
                    <span>Data Penduduk</span>
                </div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-home"></i>
                </div>
                <div class="media-body">
                    <h5>{{ $keluarga }}+</h5>
                    <span>Data Keluarga</span>
                </div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">

                    <i class="lni lni-paperclip"></i>
                </div>
                <div class="media-body">
                    <h5>{{ $berita }}</h5>
                    <span>Jumlah Postingan</span>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-users"></i>
                </div>
                <div class="media-body">
                    <h5>{{ $user }}</h5>
                    <span>Jumlah User</span>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Shipping Info -->

<!-- Start Blog Section Area -->
<section class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Informasi Terkini</h2>
                    <p>Daftar berita / kegiatan terbaru dari sistem informasi desa</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog -->
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="{{ url('/berita/' . $post->slug . '') }}">
                            <img width="370px" height="215px" src="{{ asset('storage/' . $post->foto . '') }}" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a class="category"
                                    href="{{ url('/berita/kategori/' . $post->category->slug . '') }}">{{
                                    $post->category->nama }}
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <a><i class="lni lni-timer"></i><small>
                                        {{ $post->created_at->diffForHumans() }} </small></a>
                                {{-- @php
                                $date = new DateTime($post->published_at);
                                $sekarang = now();
                                $waktu = $sekarang->diff($date);
                                @endphp
                                <a><i class="lni lni-timer"></i>
                                    @if ($waktu->y != 0)
                                    {{ $waktu->y }} Tahun Yang Lalu
                                    @elseif($waktu->m != 0)
                                    {{ $waktu->m }} Bulan Yang Lalu
                                    @elseif($waktu->d != 0)
                                    {{ $waktu->d }} Hari Yang Lalu
                                    @elseif($waktu->h != 0)
                                    {{ $waktu->h }} Jam Yang Lalu
                                    @elseif($waktu->i != 0)
                                    {{ $waktu->i }} Menit Yang Lalu
                                    @elseif($waktu->s != 0)
                                    {{ $waktu->s }} Detik Yang Lalu
                                    @endif
                                </a> --}}
                            </div>
                        </div>
                        <h4>
                            <a href="{{ url('/berita/' . $post->slug . '') }}">{{ $post->title }}</a>
                        </h4>
                        <p>{{ $post->excerpt }}</p>
                        <div class="button">
                            <a href="{{ url('/berita/' . $post->slug . '') }}" class="btn">Selengkapnya
                                ...</a>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- End Blog Section Area -->


<div class="col-12 ">
    <div class="section-title">
        <i class="lni lni-pagination  fw-bold"></i>
        <div class="button mt-5 ">
            <a href="{{ url('/berita') }}" class="btn">View all</a>
        </div>
    </div>
</div>
@endsection