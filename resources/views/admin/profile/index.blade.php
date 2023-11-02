@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Profile</h2>
            <p class="mb-0">Detail Profil Akun Anda</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/profile/edit', auth()->user()->id) }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-pencil me-2"></i>
                Perbarui akun
            </a>


        </div>
    </div>

    <div class="col-12 col-xl-12">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" style="background-color: #0167f3;">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- cek jika foto kosong --}}
                    @if ($user->masyarakat_id == 0)
                        <img src="{{ asset('storage/foto-masyarakat/user.png') }}" style="width: 200px; height:200px;"
                            class=" rounded-circle mx-auto ms-lg-5  mt-n7 mb-4" alt="Profil">
                    @else
                        <img src="{{ asset('storage/' . $user->masyarakat->foto) }}" style="width: 200px; height:200px;"
                            class=" rounded-circle mx-auto ms-lg-5  mt-n7 mb-4" alt="Profil">
                    @endif

                    <div class="card-body pb-5 d-flex justify-content-lg-start align-items-center">

                        <div class="text-start ms-3">
                            @if ($user->masyarakat_id == 0)
                                <h4 class="h3">None</h4>
                                <p><small>Set Data Masyarakat Terlebih Dahulu &nbsp;&nbsp;&nbsp; <span
                                            style="color:#0167f3;">>><a href="{{ url('/admin/masyarakat') }}"
                                                style="color:#0167f3;">Ke
                                                Data Masyarakat</a>
                                            << </span></small>
                                </p>
                            @else
                                <h4 class="h3">{{ $user->masyarakat->nama }}</h4>
                            @endif

                            <p class="px-3 py-1 bg-core d-inline-block rounded-2 font-small"><i
                                    class="lni lni-protection me-1"></i>
                                {{ $user->is_admin == true ? 'Admin' : 'User' }}</p>
                            <!-- Username -->
                            <p class="text-gray pt-2 "><i class="lni lni-user me-1"></i> {{ $user->username }}
                            </p>
                            <!-- Email -->
                            <p class="text-gray"><i class="lni lni-envelope me-1"></i> {{ $user->email }}</p>
                            <!-- NIK -->
                            @if ($user->masyarakat_id == 0)
                                <p class="text-gray mb-4"><i class="lni lni-postcard me-1"></i>
                                    None</p>
                            @else
                                <p class="text-gray mb-4"><i class="lni lni-postcard me-1"></i>
                                    {{ $user->masyarakat->nik }}</p>
                            @endif

                            <!-- Button Modal -->
                            {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form"
                                class="btn btn-secondary"><i class="lni lni-pencil me-2"></i> Perbarui
                                Password</button>
                            <!-- Modal Content -->
                            <div class="col-lg-4">
                                @include('admin.profile.password')
                                <!-- End of Modal Content -->
                            </div> --}}
                            <!-- ----------------- -->
                        </div>
                    </div>
                </div>
            </div>
    </div @endsection
