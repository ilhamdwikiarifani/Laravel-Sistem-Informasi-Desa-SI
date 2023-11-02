@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Data Masyarakat</h2>
            <p class="mb-0">Daftar Masyarakat Yang Terdaftar</p>
            <p class="mb-0">Jumlah Data : {{ $masyarakats_count }}</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/masyarakat/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>

            <div class="btn-group ms-2 ms-lg-5">
                <a href="{{ url('/admin/masyarakat/export-excel') }}" class="btn btn-sm btn-success text-white"> <i
                        class="lni lni-printer"></i></i> Ecxel </a>
            </div>

            <div class="btn-group ms-2 ms-lg-5">
                <a href="{{ url('/admin/masyarakat/print-preview') }}" target="_blank" class="btn btn-sm btn-warning"> <i
                        class="lni lni-eye"></i> Preview </a>
                <a href="{{ url('/admin/masyarakat/pdf') }}" target="_blank" class="btn btn-sm btn-danger"> <i
                        class="lni lni-download"></i> Unduh PDF </a>
            </div>
        </div>
    </div>

    {{-- <a class="btn btn-danger mb-3" href="{{ url('/admin/masyarakat/pdf') }}">create PDF</a> --}}

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

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body table-responsive">
                <table id="example" class="table  table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($masyarakats as $masyarakat)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> <img style="width:70px !important;" src="{{ asset('storage/' . $masyarakat->foto) }}"
                                        alt=""> </td>
                                <td>{{ $masyarakat->nik }}</td>
                                <td>{{ $masyarakat->nama }}</td>
                                <td>{{ $masyarakat->jenis_kelamin }}</td>
                                <td>{{ tgl_indo(date($masyarakat->tanggal_lahir)) }}</td>
                                {{-- <td>
                                <textarea cols="10" rows="1" class="text-area-style" disabled>Alamat</textarea>
                            </td> --}}
                                <td>
                                    <div>
                                        <form method="POST"
                                            action="{{ route('masyarakats.destroy', $masyarakat->id) }}">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <a href="{{ url('/admin/masyarakat/show', $masyarakat->id) }}"
                                                class="btn btn-sm bg-success text-white"><i class="lni lni-eye me-1"></i>
                                                View</a>
                                            <a href="{{ url('/admin/masyarakat/edit', $masyarakat->id) }}"
                                                class="btn btn-sm bg-warning text-white"><i class="lni lni-write me-1"></i>
                                                Edit</a>
                                            {{-- <button
                                                onclick="return confirm('Yakin Ingin Menghapus Data Dengan NIK : {{ $masyarakat->nik }}')"
                                                type="submit" class="btn btn-sm bg-danger text-white"><i
                                                    class="lni lni-trash-can me-1"></i> Delete</button> --}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin:2px" type="sumbit"
                                                class="btn btn-sm btn-danger show_confirm_masyarakat" data-toggle="tooltip"
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
