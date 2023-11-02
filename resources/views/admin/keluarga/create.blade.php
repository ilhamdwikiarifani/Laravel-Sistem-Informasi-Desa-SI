@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Tambah Data Keluarga </h2>
            <p class="mb-0">Harap Cek kebenaran Data Sebelum Di Simpan</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/keluarga') }}" class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-chevron-left me-2"></i>
                Kembali
            </a>

        </div>
    </div>


    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Tambah Data</h5>
                <small class="text-muted float-end">Input Data</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('keluargas.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nikk">Nomor Induk
                            Keluarga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-pointer"></i></span>
                                <input type="text" class="form-control @error('nikk') is-invalid @enderror"
                                    id="nikk" placeholder="Masukan NIK" name="nikk" value="{{ old('nikk') }}">
                                @error('nikk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="kepala_keluarga">kepala Keluarga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-spinner-solid"></i></span>
                                <input type="text" class="form-control @error('kepala_keluarga') is-invalid @enderror"
                                    id="kepala_keluarga" placeholder="Kepala keluarga" name="kepala_keluarga"
                                    value="{{ old('kepala_keluarga') }}">
                                @error('kepala_keluarga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="alamat">Alamat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="lni lni-travel"></i></span>
                                <textarea name="alamat" id="alamat" placeholder="Input Alamat Lengkap"
                                    class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="jk">Jumlah keluarga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control @error('jumlah_keluarga') is-invalid @enderror"
                                    id="jk" placeholder="Jumlah Anggota keluarga" name="jumlah_keluarga"
                                    value="0" readonly>
                                @error('jumlah_keluarga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn bg-core text-white">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
