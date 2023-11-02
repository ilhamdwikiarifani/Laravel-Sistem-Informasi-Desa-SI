<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;
use App\Models\DanaMasuk;
use App\Models\DanaKeluar;
// use PDF;
// use \Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade as PDF;


class DanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danas = Dana::orderBy('id', 'DESC')->paginate(5);
        $title = 'Dana';
        return view('admin.dana.index', compact('danas', 'title'))
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
        $title = "Dana";
        return view('admin.dana.create', compact('title'));
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
            'nama' => 'required|unique:danas',
            'jumlah' => 'required|numeric',
        ]);
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['waktu'] = now()->format('Y-m-d H:i:s');

        Dana::insert($validatedData);
        return redirect('/admin/dana')->with('success', 'Data ' . $request->nama . ' berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function show(Dana $dana)
    {
        //
        $danaMasuk = DanaMasuk::where('dana_id', $dana->id)->get();
        $danaKeluar = DanaKeluar::where('dana_id', $dana->id)->get();
        $title = 'Dana';
        return view('admin.dana.show', compact('title', 'dana', 'danaMasuk', 'danaKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function edit(Dana $dana)
    {
        //
        $title = 'Dana';
        return view('admin.dana.edit', compact('title', 'dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dana $dana)
    {
        //
        $rules = [
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
        ];
        if ($request->nama == $dana->nama) {
            $rules['nama'] = 'required';
        } else {
            $rules['nama'] = 'required|unique:danas';
        }
        $validatedData = $request->validate($rules);
        $dana->update($validatedData);
        return redirect('/admin/dana')->with('success', 'Data ' . $request->nama . ' berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dana $dana)
    {
        //
        $danaMasuk = DanaMasuk::where('id', $dana->id)->count();
        $danaKeluar = DanaKeluar::where('id', $dana->id)->count();
        if ($danaMasuk == 0 && $danaKeluar == 0) {
            $dana->delete();
            $pesan = "Berhasil Dihapus !";
            $tes = "success";
        } else {
            $pesan = "Tidak Dihapus Karena Memiliki Relasi !";
            $tes = "error";
        }

        return redirect('/admin/dana')->with('' . $tes . '', 'Data ' . $dana->nama . ' ' . $pesan . '');
    }

    public function landingPage()
    {
        $danas = Dana::all();
        $danaKeluar = DanaKeluar::all();
        $title = "Dana Desa";
        return view('landing-page.dana', compact('title', 'danas', 'danaKeluar'));
    }

    // domPDF
    public function danaPDF()
    {
        $danas = Dana::orderBy('id', 'DESC')->get();
        $danaMasuk = DanaMasuk::orderBy('id', 'DESC')->get();
        $danaKeluar = DanaKeluar::orderBy('id', 'DESC')->get();
        $title = 'Ekspoort PDF';
        $date = date('d/M/Y');
        $pdf = PDF::loadView('admin.dana.pdf', ['danas' => $danas, 'danaMasuk' => $danaMasuk,'danaKeluar' => $danaKeluar]);
        return $pdf->download('Dana-' . $date . '.pdf');
    }
}
