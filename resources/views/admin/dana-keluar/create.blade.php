@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Tambah Dana Keluar </h2>
            <p class="mb-0">Harap perhatikan kebenaran pengisian data !</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/dana_keluar') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-chevron-left me-2"></i>
                Kembali
            </a>

        </div>
    </div>


    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Forms</h5>
                <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('dana_keluars.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="dana">Nama / Jenis Dana</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-select"></i></span>
                                <select name="dana_id" id="dana"
                                    class="form-control @error('dana_id') is-invalid @enderror">
                                    <option value="">Pilih Dana ...</option>
                                    @foreach ($danas as $dana)
                                        <option value="{{ $dana->id }}"
                                            {{ old('dana_id') == $dana->id ? 'selected' : '' }}>
                                            {{ $dana->nama }} | @money($dana->jumlah)
                                        </option>
                                    @endforeach
                                </select>
                                @error('dana_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="jumlah">Jumlah</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-syringe"></i></span>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" placeholder="Jumlah" name="jumlah" value="{{ old('jumlah') }}" />
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <textarea name="keterangan" id="basic-icon-default-message"
                                    class="form-control @error('keterangan') is-invalid @enderror" placeholder="">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
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
