@php
    namespace App\Http\Controllers;
    use App\Models\Post;
@endphp

<h5 class="widget-title">Daftar Kategori</h5>
<ul class="custom">
    <li>
        <a href="{{ url('/berita') }}">Semua </a><span> ( {{ $posts_count }} ) </span>
    </li>
    @foreach ($categories as $category)
        <li>
            <a href="{{ url('/berita/kategori/' . $category->slug . '') }}">{{ $category->nama }} </a><span> (
                {{ $c = Post::where('category_id', $category->id)->count() }} ) </span>
        </li>
    @endforeach
</ul>
