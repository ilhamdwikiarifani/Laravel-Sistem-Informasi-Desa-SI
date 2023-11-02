@extends('landing-page.layouts.main')


@section('content')
    <!-- Start About Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{ asset('landing-page/assets/images/hero/profil-desa.png') }}" alt="#">
                        <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                            class="glightbox video"><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <h2>Sistem Informasi Desa</h2>
                        <p>Geografi desa merupakan cabang geografi yang mengkhususkan diri pada study pedesaan. Desa
                            merupakan obyek studi yang dikaji dari sudut pandang geografi yaitu pendekatan keruangan,
                            pendekatan ekologi dan pendekatan komplek wilayah. Geografi desa sebagai sub disiplin geografi
                            belum lama yaitu baru pada masa dasa warsa 1960-an. Hal ini disebabkan perhatian yang agak
                            kurang terhadap masalah kemiskinan di daerah pedesaan negara-negara berkembang.
                        </p>
                        <p>Bidang kajian berkembang dengan pesat sesuai dengan umurnya yang masih muda. Problem utama yang
                            muncul adalah pendefinisian baik pengertian geografi desa maupun pengertian desa. Geografi desa
                            mengutamakan kajian dengan pendekatan geografi sedangkan desa dari sudut pandang geografi
                            merupakan suatu wilayah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info my-3">
        <div class="container ">
            <ul>
                <!-- Free Shipping -->
                <li class="profilarea areacolor">
                    <div class="media-icon">
                        <i class="lni lni-travel w-50"></i>
                    </div>
                    <div class="media-body">
                        <p>Area</p>
                    </div>
                </li>
                <!-- Money Return -->
                <li class="profilarea">

                    <div class="media-body">
                        <h2>2.498m <sup>2</sup></h2>
                        <span>Luas Tanah Kas Desa</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li class="profilarea">
                    <div class="media-body">
                        <h2>20m <sup>2</sup></h2>
                        <span>Luas Tanah di Desa</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li class="profilarea">
                    <div class="media-body">
                        <h2>45.634m <sup>2</sup> </h2>
                        <span>Luas DHKP</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
@endsection
