@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Team Area -->
    <section class="team section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title">
                    <h2 class="wow" data-wow-delay=".4s">Terimakasih Khusus Kepada</h2>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <img style="width: 100%; display:inline-block" src="{{ asset('images/logo.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-6">
                                <img style="width: 100%; display:inline-block" src="{{ asset('images/nf-logo.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-100">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Tim Kami</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Susunan dan peran masing-masing anggota kelompok 8</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('images/hendra.jpg') }}" alt="#">
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Hendra</h3>
                                <h5>Tugas : Back End</h5>
                                <ul class="social">
                                    <li><a href="https://github.com/hendra-Ti19" target="_blank"><i
                                                class="lni lni-github-original"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/650Hendra" target="_blank"><i
                                                class="lni lni-twitter-original"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/hendra_infotech/" target="_blank"><i
                                                class="lni lni-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('images/ilham.jpeg') }}" alt="#">
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Ilham Dwiki Arifani</h3>
                                <h5>Tugas : Front End</h5>
                                <ul class="social">
                                    <li><a href="https://github.com/ilhamdwikiarifani" target="_blank"><i
                                                class="lni lni-github-original"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/akukyrn_" target="_blank"><i
                                                class="lni lni-twitter-original"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/ilham_arifani/" target="_blank"><i
                                                class="lni lni-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('images/fiesca.png') }}" alt="#">
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Fiesca Noercikalty Aditya
                                </h3>
                                <h5>Tugas : Trello & Dokumentasi </h5>
                                <ul class="social">
                                    <li>
                                        <a href="https://github.com/Fiesca13" target="_blank">
                                            <i class="lni lni-github-original"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="www.linkedin.com/in/fiesca-noercikalty-aditya" target="_blank">
                                            <i class="lni lni-linkedin-original"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/fiesca.aditya/" target="_blank">
                                            <i class="lni lni-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('images/decky.jpeg') }}" alt="#">
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Fajriansyah Decky Setiawan
                                </h3>
                                <h5>Tugas : UI/UX Desaign</h5>
                                <ul class="social">
                                    <li><a href="https://github.com/deckystwn" target="_blank"><i
                                                class="lni lni-github-original"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/deckystwn" target="_blank"><i
                                                class="lni lni-twitter-original"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/deckystwn/" target="_blank"><i
                                                class="lni lni-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            <img src="{{ asset('images/balqi.jpeg') }}" alt="#">
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>Ahmad Kasyfillah Baqi
                                </h3>
                                <h5>Tugas : Desain Database & PPT </h5>
                                <ul class="social">
                                    <li>
                                        <a href="www.linkedin.com/in/ahmad-kasyfillah-baqi" target="_blank"><i
                                                class="lni lni-linkedin-original"></i></a>
                                    </li>
                                    <li><a href="https://github.com/ahmadkasyfillahbaqi" target="_blank"><i
                                                class="lni lni-github-original"></i>
                                        </a>
                                    </li>
                                    <li><a href="https://www.instagram.com/ahmadbalqi/" target="_blank"><i
                                                class="lni lni-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Team Area -->
@endsection
