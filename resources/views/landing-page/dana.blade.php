@extends('landing-page.layouts.main')


@section('content')
    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sumber Dana</h2>
                        <p>Berikut beberapa sumber dana desa yang tercatat hingga kini di Sistem Informasi Desa (SID) tahun
                            {{ date('Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">

                            @foreach ($danas as $dana)
                                <div class="card swiper-slide">
                                    <div class="image-content">
                                        <span class="overlay"></span>
                                        <div class="card-image">
                                            <img style="position:relative;z-index:10;"
                                                src="{{ asset('storage/dana/2.jpg') }}" alt="" class="card-img">
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="name">{{ $dana->nama }}</h2>
                                        <p class="description">{{ $dana->keterangan }}</p>
                                        <button class="button">@money($dana->jumlah)</button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Riwayat Pengeluaran Dana</h2>
                        <p>Berikut list/daftar pengeluaran dari penggunaan dana desa hingga tahun {{ date('Y') }}.</p>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sumber Dana</th>
                        <th scope="col">Tanggal Pengeluaran</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @if ($danaKeluar != '[]')
                        @foreach ($danaKeluar as $dk)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $dk->dana->nama }}</td>
                                <td>{{ (new DateTime($dk->waktu))->format('d, D M Y') }}</td>
                                <td>@money($dk->jumlah)</td>
                                <td>{{ $dk->user->masyarakat->nama }}</td>
                                <td>{{ $dk->keterangan }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">
                                <h6 class="text-muted">Record Data Masih Kosong !</h6>
                            </td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </section>
@endsection
