<?php

namespace App\Http\Controllers;

use App\Models\DanaKeluar;
use Illuminate\Http\Request;

// custom model
use App\Models\Dana;

class DanaKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Dana Keluar';
        $dana_keluars = DanaKeluar::orderBy('id', 'DESC')->paginate(5);
        return view('admin.dana-keluar.index', compact('title', 'dana_keluars'))
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
        $danas = Dana::all();
        $title = 'Dana Keluar';
        return view('admin.dana-keluar.create', compact('title', 'danas'));
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
            'dana_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['waktu'] = now();

        $dana = Dana::firstWhere('id', $request->dana_id);
        $jumlah_lama = $dana->jumlah;

        $dana->update([
            'jumlah' => $jumlah_lama - $request->jumlah,
        ]);
        DanaKeluar::insert($validatedData);
        return redirect('/admin/dana_keluar')->with('success', 'Data ' . $dana->nama . ' berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanaKeluar  $danaKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(DanaKeluar $danaKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanaKeluar  $danaKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(DanaKeluar $danaKeluar)
    {
        //
        $title = 'Dana Keluar';
        $danas = Dana::all();
        return view('admin.dana-keluar.edit', compact('title', 'danas', 'danaKeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanaKeluar  $danaKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DanaKeluar $danaKeluar)
    {
        //
        $validatedData = $request->validate([
            'dana_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $validatedData['keterangan'] = $request->keterangan;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['waktu'] = now();

        $dana = Dana::firstWhere('id', $request->dana_id);
        $jumlah_lama = $dana->jumlah;

        $dana->update([
            'jumlah' => ($jumlah_lama + $danaKeluar->jumlah) - $request->jumlah,
        ]);
        $danaKeluar->update($validatedData);
        return redirect('/admin/dana_keluar')->with('success', 'Data ' . $dana->nama . ' berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanaKeluar  $danaKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(DanaKeluar $danaKeluar)
    {

        $dana = Dana::firstWhere('id', $danaKeluar->dana_id);
        $jumlah_lama = $dana->jumlah;
        $dana->update([
            'jumlah' => $jumlah_lama + $danaKeluar->jumlah,
        ]);
        $danaKeluar->delete();
        return redirect('/admin/dana_keluar')->with('success', 'Data ' . $danaKeluar->dana->nama . ' berhasil dihapus !');
    }
}
