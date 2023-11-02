@extends('admin.layouts.main')


@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Masyarakat View </h2>
            <p class="mb-0">Detail Data : {{ $masyarakat->nama }}</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/masyarakat') }}" class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-chevron-left me-2"></i>
                Kembali
            </a>

        </div>
    </div>
    @php
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    @endphp

    <div class="row mb-3 text-center">
        <div class="col-12">
            <div class="card card-body border-0 shadow border-2"
                style="border:0.5px solid rgba(0, 0, 0, 0.197) !important;">
                <h2 class="h5 mb-4">Cetak Kebutuhan Berkas</h2>
                <div class="row justify-content-center">
                    <a href="{{ url('/admin/masyarakat/sk-tidak-mampu', $masyarakat->id) }}"
                        class="btn btn-outline-success col-2"><i class="lni lni-download"></i> SK
                        Tidak Mampu</a>
                    {{-- <a href="" class="btn btn-outline-success col-2">SP SKCK</a>
                    <a href="" class="btn btn-outline-success col-2">SK Penghasilan</a> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Detail Informasi</h2>

                <!-- Foto Start -->
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <div class="w-100 h-100 ">
                            <img src="{{ asset('storage/' . $masyarakat->foto) }}"
                                class="img-fluid img-responsive rounded-2" alt="">
                        </div>
                    </div>
                    <div class="col-sm-9 mb-3">
                        <div class="mb-4">
                            <label>Nama </label>
                            <input class="form-control" type="text" placeholder="{{ $masyarakat->nama }}" disabled>
                        </div>
                        <div>
                            <div class="input-group">
                                <span class="input-group-text ">
                                    <div class="d-flex justify-content-center align-items-center gap-1"><i
                                            class="lni lni-postcard"></i>
                                        <small>Nomor Induk Kependudukan</small>
                                    </div>
                                </span>
                                <input class="form-control" type="text" placeholder="{{ $masyarakat->nik }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Foto End -->

                <!-- Data Start -->
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label>Tangga Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="lni lni-calendar"></i>
                            </span>
                            <input class="form-control" type="text"
                                placeholder="{{ tgl_indo(date($masyarakat->tanggal_lahir)) }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tempat Lahir</label>
                        <input class="form-control" type="text" placeholder="{{ $masyarakat->tempat_lahir }}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jenis Kelamin</label>
                        <input class="form-control" type="text" placeholder="{{ $masyarakat->jenis_kelamin }}"
                            disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Agama</label>
                        <input class="form-control" type="text" placeholder="{{ $masyarakat->agama->nama }}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Pendidikan Terakhir</label>
                        <input class="form-control" type="text" placeholder="{{ $masyarakat->pendidikan_terakhir }}"
                            disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <input class="form-control" type="text" placeholder="{{ $masyarakat->status }}" disabled>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="mb-4">
                            <label>Alamat </label>
                            <input class="form-control" type="text" placeholder="{{ $masyarakat->keluarga->alamat }}"
                                disabled>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- batas kanan Start -->
        <div class="col-12 col-xl-6">

            <div class="row">
                <div class="col-12">
                    <div class="card card-body border-0 shadow">
                        <h2 class="h5 mb-4">Data Keluarga</h2>
                        <div class="d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Nomor Induk Keluarga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="lni lni-postcard"></i>
                                        </span>
                                        <input class="form-control" type="text"
                                            placeholder="{{ $masyarakat->keluarga->nikk }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Kepala Keluarga</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ $masyarakat->keluarga->kepala_keluarga }}" disabled>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Alamat</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ $masyarakat->keluarga->alamat }}" disabled>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Jumlah Keluarga</label>
                                    <input class="form-control" type="text"
                                        placeholder="{{ $masyarakat->keluarga->jumlah_keluarga }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- batas kanan End -->
    </div>


    <div class="row mt-1 mb-5">
        <div class="col-12">
            <div class="card card-body border-0 shadow">
                <h2 class="h5 mb-4">Anggota Keluarga</h2>
                <div class="d-flex align-items-center">
                    <div class="row table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tempat/Tanggal Lahir</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pendidikan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($keluargas as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->tempat_lahir }}, {{ tgl_indo(date($data->tanggal_lahir)) }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->pendidikan_terakhir }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
