@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Data Keluarga</h2>
            <p class="mb-0">Data keluarga Yang Terdaftar</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/keluarga/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ url('/admin/keluarga/print-preview') }}" target="_blank" class="btn btn-sm btn-warning"> <i class="lni lni-eye"></i> Preview </a>
                <a href="{{ url('/admin/keluarga/pdf') }}" class="btn btn-sm btn-danger"> <i class="lni lni-download"></i> Unduh PDF </a>
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

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body table-responsive">
                <table id="example" class="table  table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIKK</th>
                            <th>kepala keluarga</th>
                            <th>Alamat</th>
                            <th>Jumlah keluarga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $no=1; @endphp
                        @foreach ($keluargas as $keluarga)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keluarga->nikk }}</td>
                                <td>{{ $keluarga->kepala_keluarga }}</td>
                                <td>{{ $keluarga->alamat }}</td>
                                <td>{{ $keluarga->jumlah_keluarga }} Orang | <a
                                        href="{{ url('/admin/masyarakat/create/' . $keluarga->id) }}"
                                        class="btn btn-sm bg-secondary">+</a></td>
                                <td>
                                    <div>
                                        <form action="{{ route('keluargas.destroy', $keluarga->id) }}" method="POST">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <a href="{{ url('/admin/keluarga/edit', $keluarga->id) }}"
                                                class="btn btn-sm bg-warning text-white"><i
                                                    class="lni lni-write me-1"></i>Edit</a>
                                            {{-- <button onclick="return confirm('Yakin Ingin Menghapus Data Dengan Nik : {{ $keluarga->nikk }}')" type="submit" class="btn btn-sm bg-danger text-white"><i
                                                    class="lni lni-trash-can me-1"></i>Delete</button> --}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin:2px" type="sumbit"
                                                class="btn btn-sm btn-danger show_confirm_keluarga" data-toggle="tooltip"
                                                title='Delete'><i class="lni lni-trash-can me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
