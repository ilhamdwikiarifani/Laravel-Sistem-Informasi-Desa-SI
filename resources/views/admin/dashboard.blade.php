@extends('admin.layouts.main')

@section('isi')
    <!--Section: Cards-->
    <section>

        <!--Grid row-->

        <div class="row mt-5">
            <!-------------------- Batasss --------------->
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border" style="background-color: #d9ebf0;">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape bg-white rounded-3 me-4 me-sm-0">
                                    <i class="lni lni-users" style="font-size:30px;"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Jumlah Masyarakat</h2>
                                    <h3 class="fw-extrabold mb-1">{{ $jumlahMasyarakat }}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Jumlah Masyarakat</h2>
                                    <h3 class="fw-extrabold mb-2">{{ $jumlahMasyarakat }}</h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    Tahun {{ date('Y') }}
                                    &ensp;
                                    <i class="lni lni-world me-2"></i>
                                    SID
                                </small>
                                <div class="small d-flex mt-1">
                                    <div class="flex justify-content-center align-items-center">Sejak Bulan Terakhir
                                        @if ($persen >= 0)
                                            <i class="lni lni-chevron-up text-success mx-1"
                                                style="font-size: 10px; font-weight:bold;"></i>
                                            <span class="text-success fw-bolder">{{ $persen }}%</span>
                                        @else
                                            <i class="lni lni-chevron-down text-success mx-1"
                                                style="font-size: 10px; font-weight:bold;"></i>
                                            <span class="text-danger fw-bolder">{{ $persen }}%</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------- Batasss --------------->
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border" style="background-color: #e5f49a;">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape bg-white rounded-3 me-4 me-sm-0">
                                    <i class="lni lni-users" style="font-size:30px;"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Jumlah Masyarakat</h2>
                                    <h3 class="fw-extrabold mb-1">{{ $tampilTahunSebelum }}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Jumlah Masyarakat</h2>
                                    <h3 class="fw-extrabold mb-2">{{ $tampilTahunSebelum }}</h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    Tahun {{ date('Y') - 1 }}
                                    &ensp;
                                    <i class="lni lni-world me-2"></i>
                                    SID
                                </small>
                                <div class="small d-flex mt-1">
                                    <div class="flex justify-content-center align-items-center">Dalam 12 Bulan
                                        @if ($persenS >= 0)
                                            <i class="lni lni-chevron-up text-success mx-1"
                                                style="font-size: 10px; font-weight:bold;"></i>
                                            <span class="text-success fw-bolder">{{ $persenS }}%</span>
                                        @else
                                            <i class="lni lni-chevron-down text-danger mx-1"
                                                style="font-size: 10px; font-weight:bold;"></i>
                                            <span class="text-danger fw-bolder">{{ $persenS }}%</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-------------------- Batasss --------------->
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border" style="background-color: #ddd2f0;">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape bg-white rounded-3 me-4 me-sm-0">
                                    <i class="lni lni-cloud-check" style="font-size:30px;"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Kunjungan Berita</h2>
                                    <h3 class="fw-extrabold mb-1">{{ $v }}</h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Kunjungan Berita</h2>
                                    <h3 class="fw-extrabold mb-2">{{ $v }}</h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    Feb 1 - Apr 1,
                                    &ensp;
                                    <i class="lni lni-world me-2"></i>
                                    IND
                                </small>
                                <div class="small d-flex mt-1">
                                    <div class="flex justify-content-center align-items-center">Since last month <i
                                            class="lni lni-chevron-up text-success mx-1"
                                            style="font-size: 10px; font-weight:bold;"></i><span
                                            class="text-success fw-bolder">22%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------- Batasss --------------->

            <div class="col-lg-8 col-12 mb-4">
                <div class="card border">
                    <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                        <div class="d-block mb-3 mb-sm-0">
                            <div class="fs-5 fw-normal mb-2">Data Masyarakat</div>
                            <h2 class="fs-3 fw-extrabold">{{ $jumlahMasyarakat }} | Tahun {{ now()->format('Y') }}
                            </h2>
                            <div class="small mt-2">
                                <span class="fw-normal me-2">Data {{ $ts = date('Y') - 1 }} : </span>
                                <span class="fas fa-angle-up text-success">{{ $tampilTahunSebelum }} | pertumbuhan</span>
                                <span class="text-success fw-bold"> {{ $persen }}%</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-body p-2">
                        {{-- <div class="ct-chart-sales-value ct-double-octave ct-series-g my-chart"></div> --}}
                        <div class="my-chart" id="my-chart"></div>
                    </div>
                </div>
            </div>
            <!-------------------- Batasss --------------->
            <div class="col-lg-4 col-12 mb-4 ">
                <div class="card border" style="background-color: #B5E0F9;">
                    <div class=" card-body ">
                        <h2 class=" fs-5 fw-bold mb-3">Data Keuangan Desa</h2>
                        <small>Jumlah Seluruh Dana Berdasarkan Prosesnya</small>
                        <div class="d-block mt-3">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-sm  rounded me-3 bg-white">
                                    <i class="lni lni-star-filled fw-bold text-black" style="font-size: 23px;"></i>
                                </div>
                                <div class=" d-block">
                                    <label class="mb-0 ">Dana Masuk</label>
                                    <p class="mb-0">@money($danaMasuk)</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="icon-shape icon-sm  rounded me-3 " style="background-color: #EB6E6C;">
                                    <i class="lni lni-star-half fw-bold text-white" style="font-size: 23px;"></i>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0 ">Dana Keluar</label>
                                    <p class="mb-0">@money($danaKeluar)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------- Batasss --------------->
        </div>
        <!--Grid row-->
    </section>
    <!--Section: Cards-->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var masyarakat = <?php echo json_encode($masyarakat); ?>;
        var tahun = <?php echo json_encode($tahun); ?>

        Highcharts.chart('my-chart', {
            title: {
                text: `Pernambahan data penduduk, ${ tahun }`
            },
            subtitle: {
                text: 'Source: Sistem Informasi Desa'
            },
            xAxis: {
                // categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                //     'Oktober', 'November', 'Desember'
                // ]
                categories: ['Input-1', 'Input-2', 'Input-3', 'Input-4', 'Input-5', 'Input-6', 'Input-7', 'Input-8',
                    'Input-9',
                    'Input-10', 'Input-11', 'Input-12'
                ]
            },
            yAxis: {
                title: {
                    text: 'Jumlah Penambahan Masyarakat'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Data Baru',
                data: masyarakat
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
    
@endsection
