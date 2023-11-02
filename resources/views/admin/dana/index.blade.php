@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Dana</h2>
            <p class="mb-0">Catatan Dana Desa</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/dana/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-5">
                <a href="{{ url('/admin/dana/pdf') }}" class="btn btn-sm btn-danger text-white"> <i
                        class="lni lni-download"></i></i> Unduh PDF Report </a>
            </div>
            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ url('/admin/dana_masuk') }}" class="btn btn-sm btn-success"><i
                        class="lni lni-exit-down me-2"></i> Dana Masuk</a>
                <a href="{{ url('/admin/dana_keluar') }}" class="btn btn-sm btn-warning"><i
                        class="lni lni-exit-up me-2"></i> Dana Keluar</a>
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
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 ">
                    <thead>
                        <tr>
                            <th class="border-0 ">NO</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th class="border-0">Tanggal</th>
                            <th class="border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danas as $dana)
                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ ++$i }}</a></td>
                                <td>{{ $dana->nama }}</td>
                                <td>@money($dana->jumlah)</td>
                                <td>
                                    <textarea cols="20" rows="1" class="text-area-style" disabled>{{ $dana->keterangan }}</textarea>
                                </td>
                                <td>{{ (new DateTime($dana->waktu))->format('d, D M Y') }}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('danas.destroy', $dana->id) }}" method="POST">
                                            @csrf
                                            <a style="margin-left:2px" href="{{ url('/admin/dana/show', $dana->id) }}"
                                                class="btn btn-sm bg-success text-white"><i
                                                    class="lni lni-eye me-1"></i>Lihat</a>
                                            <a style="margin-left:2px" href="{{ url('/admin/dana/edit', $dana->id) }}"
                                                class="btn btn-sm bg-warning"><i class="lni lni-write me-1"></i>Ubah</a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin-left:2px" type="submit"
                                                class="btn btn-sm bg-danger text-white show_confirm_dana"
                                                data-toggle="tooltip"><i class="lni lni-trash-can me-1"></i>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach

                    </tbody>
                </table>

                {!! $danas->links() !!}
            </div>
        </div>
    </div>
@endsection
