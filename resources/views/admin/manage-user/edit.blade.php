@extends('admin.layouts.main')


@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Edit User : {{ $user->username }}</h2>
            <p class="mb-0">Harap isi data dengan benar.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/manage-user') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-chevron-left me-2"></i>
                Kembali
            </a>

        </div>
    </div>


    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Forms</h5>
                <small class="text-muted float-end">Edit data akun</small>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('manage-users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="idx" value="{{ $user->id }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="masyarakat_id">Id Masyarakat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-select"></i></span>
                                <select name="masyarakat_id" id="masyarakat_id"
                                    class="form-control @error('masyarakat_id') is-invalid @enderror">
                                    <option value="">Pilih Masyarakat ...</option>
                                    @foreach ($masyarakats as $m)
                                        <option value="{{ $m->id }}"
                                            {{ old('masyarakat_id', $user->masyarakat_id) == $m->id ? 'selected' : '' }}>
                                            {{ $m->nama }} | {{ $m->nik }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('masyarakat_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="username">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-comments-reply"></i></span>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email', $user->email) }}" name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="is_admin">Role</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-select"></i></span>
                                <select name="is_admin" id="is_admin"
                                    class="form-control @error('is_admin') is-invalid @enderror">
                                    <option value="">Pilih Role ...</option>
                                    <option value="1"
                                        {{ old('is_admin', $user->is_admin) == true ? 'selected' : '' }}>Admin</option>
                                    <option value="0"
                                        {{ old('is_admin', $user->is_admin) == false ? 'selected' : '' }}>User</option>
                                </select>
                                @error('is_admin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="lni lni-protection"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="basic-icon-default-fullname" placeholder="Password" name="password"
                                    value="{{ old('password', $user->password) }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn bg-core text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
