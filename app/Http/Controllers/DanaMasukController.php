<?php

namespace App\Http\Controllers;

use App\Models\DanaMasuk;
use Illuminate\Http\Request;

// custom model
use App\Models\Dana;

class DanaMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Dana Masuk';
        $dana_masuks = DanaMasuk::orderBy('id', 'DESC')->paginate(5);
        return view('admin.dana-masuk.index', compact('title', 'dana_masuks'))
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
        $title = 'Dana Masuk';
        return view('admin.dana-masuk.create', compact('title', 'danas'));
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
            'jumlah' => $jumlah_lama + $request->jumlah,
        ]);
        DanaMasuk::insert($validatedData);
        return redirect('/admin/dana_masuk')->with('success', 'Data ' . $dana->nama . ' berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanaMasuk  $danaMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(DanaMasuk $danaMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanaMasuk  $danaMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(DanaMasuk $danaMasuk)
    {
        //
        $title = 'Dana Masuk';
        $danas = Dana::all();
        return view('admin.dana-masuk.edit', compact('title', 'danas', 'danaMasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanaMasuk  $danaMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DanaMasuk $danaMasuk)
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
            'jumlah' => ($jumlah_lama - $danaMasuk->jumlah) + $request->jumlah,
        ]);
        $danaMasuk->update($validatedData);
        return redirect('/admin/dana_masuk')->with('success', 'Data ' . $dana->nama . ' berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanaMasuk  $danaMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DanaMasuk $danaMasuk)
    {
        $dana = Dana::firstWhere('id', $danaMasuk->dana_id);
        $jumlah_lama = $dana->jumlah;
        $dana->update([
            'jumlah' => $jumlah_lama - $danaMasuk->jumlah,
        ]);
        $danaMasuk->delete();
        return redirect('/admin/dana_masuk')->with('success', 'Data ' . $danaMasuk->dana->nama . ' berhasil dihapus !');
    }
}
