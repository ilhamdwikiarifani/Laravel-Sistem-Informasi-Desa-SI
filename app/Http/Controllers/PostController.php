<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use App\Models\Keluarga;
use App\Models\Masyarakat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // menampilkan di admin page
    public function index()
    {
        //
        $posts = Post::latest()->paginate(5);
        return view('admin.berita.index', [
            "title" => "Berita"
        ], compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // menampilkan berita di home
    public function home()
    {
        //
        $posts = Post::latest()->paginate(3);
        $masyarakat = Masyarakat::count();
        $keluarga = Keluarga::count();
        $berita = Post::count();
        $user = User::count();
        return view('landing-page.home', [
            "title" => "Home"
        ], compact('posts','masyarakat','keluarga','berita','user'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    // menampilkan list berita di halaman berita
    public function berita()
    {
        $head_berita = Post::all()->last();
        // $head_berita = Post::last();
        // return $head_berita;
        $posts_count = Post::count();
        $categories = Category::all();
        $posts = Post::latest()->paginate(5);
        return view('landing-page.berita', [
            "title" => "Daftar Berita"
        ], compact('posts', 'categories', 'posts_count', 'head_berita'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.berita.create', [
            "title" => "Berita"
        ], compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData =  $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'category_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-post');
        }

        $validatedData['title'] = Str::title($request->title);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['published_at'] = now();

        Post::create($validatedData);

        return redirect('/admin/berita')->with('success', 'Berita ' . $request->title . ' berhasil diposting !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        views($post)->cooldown(now()->addHours(1))->record();
        $totalViews = views($post)
            ->count();
        return view('landing-page.berita-detail', [
            "title" => "Berita",
        ], compact('post', 'totalViews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('admin.berita.edit', [
            "title" => "Berita"
        ], compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Post $post)
    {
        //
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ];

        if ($post->slug != $request->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        // validasi
        $validatedData = $request->validate($rules);
        $validatedData['title'] = Str::title($request->title);

        if ($post->body != $request->body) {
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        }

        // simpan foto di storage
        if ($request->file('foto')) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-post');
        } else {
            $validatedData['foto'] = $request->foto_lama;
        }

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/admin/berita')->with('success', 'Berita ' . $request->title . ' Berhasi di Ubah !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if ($post->foto) {
            Storage::delete($post->foto);
        }
        $post->delete();
        return redirect('/admin/berita')
            ->with('success', 'Data ' . $post->title . ' telah dihapus !');
    }


    public function checkSlug(request $request)
    {
        $slug = Str::slug($request->title, '-');
        return response()->json(['slug' => $slug]);
    }
}
