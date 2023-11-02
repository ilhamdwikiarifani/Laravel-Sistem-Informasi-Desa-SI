@extends('admin.layouts.main')


@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Detail User : {{ $user->username }}</h2>
            <p class="mb-0">Informasi akun terintegrasi dengan data masyarakat</p>
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
                <h5 class="mb-0">Detail user</h5>
                <small class="text-muted float-end">Detail data akun</small>
            </div>
            <div class="card-body">

                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-5">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" readonly value="{{ $user->username }}">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" readonly value="{{ $user->email }}">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" readonly
                                        value={{ $user->is_admin == true ? 'Admin' : 'User' }}>
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 bg-gray-100 p-3 rounded">
                            <h5 class="mb-4">Akun -> Masyarakat</h5>
                            <form>
                                @if (empty($user->masyarakat))
                                    <p class="text-muted text-center">Belum Ada Data Yang Teralasi</p>
                                @else
                                    <div class="mb-2">
                                        Nama : <label for="exampleInputEmail1"
                                            class="form-label">{{ $user->masyarakat->nama }}</label>
                                    </div>
                                    <div class="mb-2">
                                        Nik : <label for="exampleInputPassword1"
                                            class="form-label">{{ $user->masyarakat->nik }}</label>
                                    </div>
                                    <div class="mb-2">
                                        Status : <label for="exampleInputPassword1"
                                            class="form-label">{{ $user->masyarakat->status }}</label>
                                    </div>
                                    <div class="mb-2">
                                        Pendidikan : <label for="exampleInputPassword1"
                                            class="form-label">{{ $user->masyarakat->pendidikan_terakhir }}</label>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- / Content -->
@endsection
