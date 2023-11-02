@extends('landing-page.layouts.main')

@section('content')
    <!-- Start Faq Area -->
    <section class="faq section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Visi & Misi</h2>
                        <p>Berikut Visi Dan Misi Desa Yang di Bawa Oleh Kepala Desa Menjabat Tahun {{ date('Y') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="title">Visi</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>“ MENJADIKAN DESA KONOHA YANG CERDAS, MAJU, MANDIRI DAN SEJAHTERA “</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="title">Misi</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-2">1. Mengamalkan dan melaksanakan ajaran agama dalam kehidupan
                                        sehari-hari</p>
                                    <p class="mb-2">2.Meningkatkan kinerja dan pelayanan aparat yang berkualitas,
                                        profesional dan berjiwa pelayanan prima</p>
                                    <p class="mb-2">3. Meningkatkan sarana dan prasarana yang mendukung dalam
                                        kehidupan bermasyarakat</p>
                                    <p class="mb-2">4. Meningkatkan taraf hidup masyarakat</p>
                                    <p class="mb-2">5. Mengupayakan kemandirian masyarakat dalam pelaksanaan
                                        otonomi berbasis pada potensi desa</p>
                                    <p class="mb-2">6. Meningkatkan pemberdayaan masyarakat melalui partisipasi
                                        aktif dalam pembangunan maupun </p>
                                    <p class="mb-2"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Faq Area -->
@endsection
