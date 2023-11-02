@extends('admin.layouts.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Berita</h2>
            <p class="mb-0">Your web analytics dashboard template.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ url('/admin/berita/create') }}"
                class="btn btn-sm bg-core text-white d-inline-flex align-items-center">
                <i class="lni lni-plus me-2"></i>
                Tambah Data
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                {{-- <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button> --}}
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
                            <th class="border-0 ">#</th>
                            <th>Judul</th>
                            {{-- <th class="border-0">Isi</th> --}}
                            <th>Foto</th>
                            <th>Time</th>
                            <th>Kategori</th>
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            <!-- Item -->
                            <tr>
                                <td><a href="#" class="text-primary fw-bold">{{ ++$i }}</a></td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                {{-- <td>
                                    <textarea cols="15" rows="1" class="text-area-style" disabled>{!! $post->body !!}</textarea>
                                </td> --}}
                                <td><img class="img-thumbnail" width="150px"
                                        src="{{ asset('storage/' . $post->foto . '') }}" alt=""></td>
                                @php
                                    $date = new DateTime($post->published_at);
                                @endphp
                                <td>{{ $date->format('D, d M Y | H:i:s') }}</td>
                                <td>{{ $post->category->nama }}</td>
                                <td>
                                    <div>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            {{-- @method('DELETE') --}}

                                            <a href="{{ url('/admin/berita/edit', $post->id) }}"
                                                class="btn btn-sm btn-warning"><i class="lni lni-write me-1"></i>Edit</a>

                                            {{-- <button onclick="return confirm('Yakin Menghapus {{ $post->title }}')"
                                                type="submit" data-bs-toggle="modal" data-bs-target="#hapus"
                                                class="btn btn-sm btn-danger"><i
                                                    class="lni lni-trash-can me-1"></i>Delete</button> --}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button style="margin:2px" type="sumbit"
                                                class="btn btn-sm btn-danger show_confirm_berita" data-toggle="tooltip"
                                                title='Delete'><i class="lni lni-trash-can me-1"></i>Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-5">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
