@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Manage User</h2>
            <p class="mb-0">List Data User Dan Admin Yang Terdaftar.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/manage-user/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>

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

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 ">
                    <thead>
                        <tr>
                            <th class="border-0 ">No</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ ++$i }}</a></td>
                                @if (empty($user->masyarakat))
                                    <td><img src="{{ asset('storage/foto-masyarakat/user.png') }}" width="60px"
                                            class="img-thumbnail" alt=""></td>
                                @else
                                    <td><img src="{{ asset('storage/' . $user->masyarakat->foto) }}" width="60px"
                                            class="img-thumbnail" alt=""></td>
                                @endif
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin == true ? 'Admin' : 'User' }}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('manage-users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            <a href="{{ url('/admin/manage-user/detail', $user->id) }}"
                                                class="btn btn-sm bg-success"><i class="lni lni-eye me-1"></i> Lihat </a>
                                            <a href="{{ url('/admin/manage-user/edit', $user->id) }}"
                                                class="btn btn-sm bg-warning"><i class="lni lni-write me-1"></i> Edit </a>

                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="idx" value="{{ $user->id }}">
                                            <button style="margin:2px" type="sumbit"
                                                class="btn btn-sm btn-danger show_confirm_akun" data-toggle="tooltip"
                                                title='Delete'><i class="lni lni-trash-can me-1"></i>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-5">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
