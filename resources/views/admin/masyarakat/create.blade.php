@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Tambah Data Masyarakat </h2>
            <p class="mb-0">Harap Cek kebenaran Data Sebelum Di Simpan</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/masyarakat') }}" class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
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

                <form method="POST" action="{{ route('masyarakats.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="nikk">No. KK</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="lni lni-drop"></i></span>
                                <select name="keluarga_id" id="nikk"
                                    class="form-control @error('keluarga_id') is-invalid @enderror">
                                    <option value="">Pilih Keluarga id / N0.KK ...</option>
                                    @foreach ($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id }}"
                                            {{ old('keluarga_id') == $keluarga->id ? 'selected' : '' }}>
                                            {{ $keluarga->nikk }}</option>
                                    @endforeach
                                </select>
                                @error('keluarga_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-2 col-form-label">
                            Preview
                        </div>
                        <div class="col-sm-10">
                            <img width="200px" class="img-fluid img-thumbnail img-preview" alt="">
                        </div>
                    </div>

                    {{-- foto --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="lni lni-image"></i></span>
                                <input type="file" id="foto"
                                    class="form-control @error('foto') is-invalid @enderror" name="foto"
                                    onchange="previewImage()">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nik">NIK</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-pointer"></i></span>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-pointer"></i></span>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" placeholder="Masukan Nama Lengkap" name="nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="jk">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="lni lni-drop"></i></span>
                                <select name="jenis_kelamin" id="jk"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih jenis Kelamin ...</option>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki -Laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="agama">Agama</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="lni lni-drop"></i></span>
                                <select name="agama_id" id="agama"
                                    class="form-control @error('agama_id') is-invalid @enderror">
                                    <option value="">Pilih jenis Agama ...</option>
                                    @foreach ($agamas as $agama)
                                        <option value="{{ $agama->id }}"
                                            {{ old('agama_id') == $agama->id ? 'selected' : '' }}>
                                            {{ $agama->nama }}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-map-marker"></i></span>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tl">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-calendar"></i></span>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tl" name="tanggal_lahir" placeholder="dd/mm/yyyy" value="{{ old('tanggal_lahir') }}" required/>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="status">Status</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="lni lni-drop"></i></span>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status ...</option>
                                    <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>
                                        Menikah</option>
                                    <option value="Belum Menikah"
                                        {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>
                                        Belum Menikah</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="pendidikan">Pendidikan Terakhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="lni lni-drop"></i></span>
                                <select name="pendidikan_terakhir" id="pendidikan"
                                    class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                                    <option value="">Pilih Pendidikan ...</option>
                                    <option value="Tidak Lulus SD"
                                        {{ old('pendidikan_terakhir') == 'Tidak Lulus SD' ? 'selected' : '' }}>
                                        Tidak Lulus SD</option>
                                    <option value="Lulus SD"
                                        {{ old('pendidikan_terakhir') == 'Lulus SD' ? 'selected' : '' }}>
                                        Lulus SD</option>
                                    <option value="Lulus SMP"
                                        {{ old('pendidikan_terakhir') == 'Lulus SMP' ? 'selected' : '' }}>
                                        Lulus SMP</option>
                                    <option value="Lulus SMA"
                                        {{ old('pendidikan_terakhir') == 'Lulus SMA' ? 'selected' : '' }}>
                                        Lulus SMA</option>
                                    <option value="Strata 1"
                                        {{ old('pendidikan_terakhir') == 'Strata 1' ? 'selected' : '' }}>
                                        Strata 1</option>
                                    <option value="Strata 2"
                                        {{ old('pendidikan_terakhir') == 'Strata 2' ? 'selected' : '' }}>
                                        Strata 2</option>
                                    <option value="Strata 3"
                                        {{ old('pendidikan_terakhir') == 'Strata 3' ? 'selected' : '' }}>
                                        Strata 3</option>
                                </select>
                                @error('pendidikan_terakhir')
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

    <script>
        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
