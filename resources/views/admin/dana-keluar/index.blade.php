@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Dana Keluar</h2>
            <p class="mb-0">Catatan Dana Keluar</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/dana_keluar/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ url('/admin/dana')}}" type="button" class="btn btn-sm btn-success"><i class="lni lni-wallet me-2"></i> Ke Menu Dana</a>
                {{-- <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button> --}}
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
                            <th class="border-0 ">No</th>
                            <th> Sumber / Jenis Dana</th>
                            <th>Jumlah</th>
                            <th class="border-0">Tanggal</th>
                            <th>Penginput</th>
                            <th>Keterangan</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dana_keluars as $dk)
                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ ++$i }}</a></td>
                                <td>{{ $dk->dana->nama }}</td>
                                <td> @money($dk->jumlah) </td>
                                <td>{{ (new DateTime($dk->waktu))->format('d, D M Y') }}</td>
                                <td>{{ $dk->user->masyarakat->nama }}</td>
                                <td>
                                    <textarea cols="20" rows="1" class="text-area-style" disabled>{{ $dk->keterangan }}</textarea>
                                </td>
                                <td>
                                    <div>
                                        <form action="{{ route('dana_keluars.destroy', $dk->id) }}" method="POST">
                                            @csrf
                                            <a style="margin:2px" href="{{ url('/admin/dana_keluar/edit', $dk->id) }}"
                                                class="btn btn-sm bg-warning"><i class="lni lni-write me-1"></i>Ubah</a>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin:2px" type="submit"
                                                class="btn btn-sm bg-danger text-white show_confirm_dana_keluar"
                                                data-toggle="tooltip"><i class="lni lni-trash-can me-1"></i>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach

                    </tbody>
                </table>
                {!! $dana_keluars->links() !!}
            </div>
        </div>
    </div>
@endsection
