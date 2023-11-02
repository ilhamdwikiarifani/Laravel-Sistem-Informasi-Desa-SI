<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

// use PDF;
use Barryvdh\DomPDF\Facade as PDF;

use App\Rules\CheckNik;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Keluarga";
        $keluargas = Keluarga::all();
        return view('admin.keluarga.index', compact('keluargas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Keluarga";
        return view('admin.keluarga.create', compact('title'));
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
        $rules = [
            'nikk' => ['required', 'numeric', 'unique:keluargas', new CheckNik()],
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'jumlah_keluarga' => 'required|numeric',
        ];
        $validatedData = $request->validate($rules);
        // other val
        Keluarga::create($validatedData);
        return redirect('/admin/keluarga')
            ->with('success', 'Data keluarga ' . $request->kepala_keluarga . ' berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        //
        $title = "Keluarga";
        return view('admin.keluarga.view', compact('title', 'keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        //
        $title = "Keluarga";
        return view('admin.keluarga.edit', compact('title', 'keluarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        //
        $rules = [
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'jumlah_keluarga' => 'required|numeric',
        ];

        if (empty($request->nikk)) {
            $rules['nikk'] = 'required';
        } else if ($request->nikk == $keluarga->nikk) {
            $rules['nikk'] = ['required', 'numeric', new CheckNik()];
        } else {
            $rules['nikk'] = ['required', 'numeric', 'unique:keluargas', new CheckNik()];
        }

        $validatedData = $request->validate($rules);
        // other val

        $keluarga->update($validatedData);
        return redirect('/admin/keluarga')
            ->with('success', 'Data keluarga ' . $request->kepala_keluarga . ' berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        //
        $cek = Masyarakat::where('keluarga_id', $keluarga->id)->count();
        if ($cek == 0) {
            $keluarga->delete();
            $pesan = "Berhasil Dihapus !";
            $tes = "success";
        } else {
            $pesan = "Tidak Dihapus Karena Memiliki Relasi !";
            $tes = "error";
        }
        return redirect('/admin/keluarga')
            ->with('' . $tes . '', ' Keluarga ' . $keluarga->kepala_keluarga . ' ' . $pesan . '');
    }


    // domPDF
    public function generatePDF()
    {
        $keluargas = Keluarga::orderBy('id', 'DESC')->get();
        $title = 'Ekspoort PDF';
        $date = date('d/M/Y');

        $pdf = PDF::loadView('admin.keluarga.pdf', ['keluargas' => $keluargas]);

        return $pdf->download('Keluarga-' . $date . '.pdf');
    }
    // domPDF
    public function previewPDF()
    {
        $keluargas = Keluarga::orderBy('id', 'DESC')->get();
        $title = 'Ekspoort PDF';
        $date = date('m/d/Y');

        // $pdf = PDF::loadView('admin.keluarga.pdf', ['keluargas' => $keluargas]);

        // return $pdf->download('Masyarakat-' . $date . '.pdf');
        return view('admin.keluarga.pdf', compact('title', 'keluargas'));
    }
}
