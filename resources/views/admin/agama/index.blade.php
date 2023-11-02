@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">List Agama</h2>
            <p class="mb-0">Daftar Agama Sementara Di Indonesia</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/list-agama/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                {{-- <button type="button" class="btn btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-outline-gray-600">Export</button> --}}
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
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0 w-100">Agama</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @php $no=1; @endphp
                        @foreach ($agama as $a)
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ $no++ }}</a></td>
                                <td>{{ $a->nama }}</td>
                                <td>
                                    <div>

                                        <form action="{{ route('agamas.destroy', $a->id) }}" method="POST">
                                            @csrf
                                            <a href="{{ url('/admin/list-agama/edit', $a->id) }}" style="margin:2px"
                                                class="btn btn-sm btn-warning"><i class="lni lni-write me-1"></i>Edit</a>
                                            {{-- <button style="margin:2px"
                                                onclick="return confirm('Yakin Menghapus {{ $category->nama }}')"
                                                type="sumbit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus"><i
                                                    class="lni lni-trash-can me-1"></i>Delete</button> --}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin:2px" type="sumbit"
                                                class="btn btn-sm btn-danger show_confirm_agama" data-toggle="tooltip"
                                                title='Delete'><i class="lni lni-trash-can me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- End of Item -->
                    </tbody>
                </table>
                <div class="mt-5">
                    {{-- {!! $agama->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
