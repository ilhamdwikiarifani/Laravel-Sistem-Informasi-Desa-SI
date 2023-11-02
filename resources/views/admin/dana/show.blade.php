@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Dana</h2>
            <p class="mb-0">Catatan Dana Desa</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/dana') }}" class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-back me-2">
                    < </i>
                        kembali
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                {{-- <a href="{{ url('/admin/dana_masuk') }}" class="btn btn-sm btn-outline-gray-600">Dana Masuk</a>
                <a href="{{ url('/admin/dana_keluar') }}" class="btn btn-sm btn-outline-gray-600">Dana Keluar</a> --}}
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <p class="bg-success text-white p-1 rounded"> Nama/Jenis </p>
                        <small>{{ $dana->nama }}</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <p class="bg-success text-white p-1 rounded">Saldo</p>
                        <small> @money($dana->jumlah)</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <p class="bg-success text-white p-1 rounded">Keterangan</p>
                        <small>{{ $dana->keterangan }}</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <p class="bg-success text-white p-1 rounded">Waktu Input</p>
                        <small>{{ (new DateTime($dana->waktu))->format('D, d M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4 p-4">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4 class=" rounded text-center">Data Dana Masuk</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 ">
                            @if ($danaMasuk != '[]')
                                <thead>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Penginput</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    @foreach ($danaMasuk as $dm)
                                        <tr>
                                            @php $no=1; @endphp
                                            <td>{{ $no++ }}</td>
                                            <td>@money($dm->jumlah)</td>
                                            <td>{{ $dm->user->masyarakat->nama }}</td>
                                            <td>
                                                <textarea cols="20" rows="1" class="text-area-style" disabled>{{ $dm->keterangan }}</textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <h5 class="text-muted text-center">Belum Ada Data</h5>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <h4 class=" rounded text-center">Data Dana Keluar</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 ">
                            @if ($danaKeluar != '[]')
                                <thead>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Penginput</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    @foreach ($danaKeluar as $dk)
                                        <tr>
                                            @php $no=1; @endphp
                                            <td>{{ $no++ }}</td>
                                            <td>@money($dk->jumlah)</td>
                                            <td>{{ $dk->user->masyarakat->nama }}</td>
                                            <td>
                                                <textarea cols="20" rows="1" class="text-area-style" disabled>{{ $dk->keterangan }}</textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <h5 class="text-muted text-center">Belum Ada Data</h5>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
