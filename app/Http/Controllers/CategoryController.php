<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

// str slug
use Illuminate\Support\Str;

use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $title = "Kategori Berita";
        $categories = Category::latest()->paginate(5);
        return view('admin.kategori-berita.index', compact('categories', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function berita(Category $category)
    {
        //
        $head_berita = Post::all()->last();
        $posts_count = Post::count();
        $categories = Category::all();
        $posts = Post::where('category_id', '=', $category->id)->latest()->paginate(5);
        return view('landing-page.berita', [
            "title" => "Berita Kategori : " . $category->nama . "",
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
        return view('admin.kategori-berita.create', [
            "title" => "Kategori Berita"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $validatedData['nama'] = Str::title($request->nama);
        Category::create($validatedData);
        return redirect('/admin/kategori-berita')
            ->with('success', 'Kategori ' . $request->nama . ' Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $title = "Kategori Berita";
        return view('admin.kategori-berita.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        if ($request->slug == $category->slug) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'slug' => 'required',
            ]);
        } else {
            $validatedData = $request->validate([
                'nama' => 'required',
                'slug' => 'required|unique:categories',
            ]);
        }
        $validatedData['nama'] = Str::title($request->nama);
        $category->update($validatedData);
        return redirect('/admin/kategori-berita')
            ->with('success', 'Kategori ' . $request->nama . ' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $cek = Post::where('category_id', $category->id)->count();
        if ($cek == 0) {
            $category->delete();
            $pesan = "Berhasil Dihapus !";
            $tes = "success";
        } else {
            $pesan = "Tidak Dihapus Karena Memiliki Relasi !";
            $tes = "error";
        }
        return redirect('/admin/kategori-berita')
            ->with('' . $tes . '', 'Kategori ' . $category->nama . ' ' . $pesan . '');
    }


    public function slugest(request $request)
    {
        $slug = Str::slug($request->nama, '-');
        return response()->json(['slug' => $slug]);
    }
}
