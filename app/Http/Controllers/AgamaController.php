<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Masyarakat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agama = Agama::orderBy('id', 'DESC')->get();
        $title = 'List Agama';
        return view('admin.agama.index', compact('title', 'agama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "List Agama";
        return view('admin.agama.create', compact('title'));
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

        $validatedData = $request->validate([
            'nama' => 'required|unique:agamas',
        ]);

        Agama::create($validatedData);
        return redirect('/admin/list-agama')
            ->with('success', 'Agama ' . $request->nama . ' Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(Agama $agama)
    {
        //
        $title = "Kategori Berita";
        return view('admin.agama.edit', compact('agama', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agama $agama)
    {
        //
        if ($request->nama === $agama->nama) {
            $request->validate([
                'nama' => 'required',
            ]);
        } else {
            $request->validate([
                'nama' => 'required|unique:agamas',
            ]);
        }

        $agama->update($request->all());
        return redirect('/admin/list-agama')
            ->with('success', 'Agama ' . $request->nama . ' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agama $agama)
    {
        //
        $cek = Masyarakat::where('agama_id', $agama->id)->count();
        if ($cek == 0) {
            $agama->delete();
            $pesan = "Berhasil Dihapus !";
            $tes = "success";
        } else {
            $pesan = "Tidak Dihapus Karena Memiliki Relasi !";
            $tes = "error";
        }
        return redirect('/admin/list-agama')
            ->with('' . $tes . '', 'Kategori ' . $agama->nama . ' ' . $pesan . '');
    }
}
