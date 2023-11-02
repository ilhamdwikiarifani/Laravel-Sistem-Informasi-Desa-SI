<?php

namespace App\Http\Controllers;

// models
use App\Models\Agama;
use App\Models\Keluarga;
use App\Models\Masyarakat;
use App\Models\User;
// request
use Illuminate\Http\Request;
// use PDF;
// use \Barryvdh\DomPDF\Facade\PDF;
use Barryvdh\DomPDF\Facade as PDF;
//
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
// storage link
use Illuminate\Support\Facades\Storage;
//excel
use App\Exports\MasyarakatsExport;
use App\Imports\MasyarakatsImport;
use Maatwebsite\Excel\Facades\Excel;
// rules
use App\Rules\CheckNik;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Masyarakat";
        // $masyarakats = Masyarakat::latest()->paginate(5);
        $masyarakats = Masyarakat::orderBy('id', 'DESC')->get();
        $masyarakats_count = Masyarakat::count();
        return view('admin.masyarakat.index', compact('title', 'masyarakats', 'masyarakats_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function baru(Request $request)
    {
        //
        $title = "Masyarakat";
        $agamas = Agama::all();
        $keluargas = Keluarga::all();
        $id_keluarga = Keluarga::where('id', $request->id)->value('id');
        $nama_keluarga = Keluarga::where('id', $request->id)->value('kepala_keluarga');
        return view('admin.masyarakat.create-baru', compact('title', 'keluargas', 'agamas', 'id_keluarga', 'nama_keluarga'));
    }

    public function simpan(Request $request)
    {
        //
        $rules = [
            'keluarga_id' => 'required',
            'nik' => ['required', 'numeric', 'unique:masyarakats', new CheckNik()],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
            'pendidikan_terakhir' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ];

        $validatedData = $request->validate($rules);
        // other val
        // foto
        $validatedData = $request->validate($rules);
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-masyarakat');
        }
        // simpan masyarakat
        Masyarakat::create($validatedData);

        // update jumlah keluarga
        // $find_keluarga = Keluarga::where('id',$request->keluarga_id)->get('jumlah_keluarga');
        $find_keluarga = Keluarga::where('id', $request->keluarga_id)->value('jumlah_keluarga');
        $jumlah_keluarga = $find_keluarga + 1;
        Keluarga::where('id', $request->keluarga_id)->update([
            'jumlah_keluarga' => $jumlah_keluarga,
        ]);

        return redirect('/admin/keluarga')
            ->with('success', 'Data Masyarakat Dengan NIK : ' . $request->nik . ' Berhasil Ditambahkan !');
    }


    public function create()
    {
        //
        $title = "Masyarakat";
        $agamas = Agama::all();
        $keluargas = Keluarga::all();
        return view('admin.masyarakat.create', compact('title', 'keluargas', 'agamas'));
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
            'keluarga_id' => 'required',
            'nik' => ['required', 'numeric', 'unique:masyarakats', new CheckNik()],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
            'pendidikan_terakhir' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-masyarakat');
        }
        // other val

        // simpan masyarakat
        Masyarakat::create($validatedData);

        // update jumlah keluarga
        // $find_keluarga = Keluarga::where('id',$request->keluarga_id)->get('jumlah_keluarga');
        $find_keluarga = Keluarga::where('id', $request->keluarga_id)->value('jumlah_keluarga');
        $jumlah_keluarga = $find_keluarga + 1;
        Keluarga::where('id', $request->keluarga_id)->update([
            'jumlah_keluarga' => $jumlah_keluarga,
        ]);

        return redirect('/admin/masyarakat')
            ->with('success', 'Data Masyarakat Dengan NIK : ' . $request->nik . ' Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
        $keluargas = Masyarakat::where('keluarga_id', '=', $masyarakat->keluarga_id)->get();
        $title = "Masyarakat";
        return view('admin.masyarakat.view', compact('masyarakat', 'title', 'keluargas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        //
        $title = "Masyarakat";
        $agamas = Agama::all();
        $keluargas = Keluarga::all();
        return view('admin.masyarakat.edit', compact('title', 'keluargas', 'masyarakat', 'agamas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        //
        $rules = [
            'keluarga_id' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status' => 'required',
            'pendidikan_terakhir' => 'required',
        ];

        if (empty($request->nik)) {
            $rules['nik'] = 'required';
        } else if ($request->nik == $masyarakat->nik) {
            $rules['nik'] = ['required', 'numeric', new CheckNik()];
        } else {
            $rules['nik'] = ['required', 'numeric', 'unique:masyarakats', new CheckNik()];
        }

        $validatedData = $request->validate($rules);

        // simpan foto di storage
        if ($request->file('foto')) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-masyarakat');
        } else {
            $validatedData['foto'] = $request->foto_lama;
        }

        // update
        $masyarakat->update($validatedData);

        // trigger ke tabel keluarga

        return redirect('/admin/masyarakat')
            ->with('success', 'Data Masyarakat Dengan Nik : ' . $request->nik . ' berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        //cek koneksi akun
        $cek_akun = User::where('masyarakat_id', $masyarakat->id)->count();
        if ($cek_akun == 0) {

            if ($masyarakat->foto) {
                Storage::delete($masyarakat->foto);
            }

            $masyarakat->delete();

            // trigger ke tabel keluarga
            $find_keluarga = Keluarga::where('id', $masyarakat->keluarga_id)->value('jumlah_keluarga');
            $jumlah_keluarga = $find_keluarga - 1;
            Keluarga::where('id', $masyarakat->keluarga_id)->update([
                'jumlah_keluarga' => $jumlah_keluarga,
            ]);
            $judul = 'success';
            $isi = 'Berhasil, Data berhasil dihapus !!!';
        } else {
            $judul = 'error';
            $isi = 'Gagal hapus, terdapat relasi ke salah satu akun !!!';
        }

        return redirect('/admin/masyarakat')
            ->with('' . $judul . '', '' . $isi . '');
    }


    // domPDF
    public function generatePDF()
    {
        $masyarakats = Masyarakat::orderBy('id', 'DESC')->get();
        $date = date('d/M/Y');
        $pdf = PDF::loadView('admin.masyarakat.pdf', ['masyarakats' => $masyarakats]);
        return $pdf->download('Masyarakat-' . $date . '.pdf');
    }
    // domPDF
    public function previewPDF()
    {
        $masyarakats = Masyarakat::orderBy('id', 'DESC')->get();
        $title = 'Ekspoort PDF';
        $date = date('d/d/Y');
        // $pdf = PDF::loadView('admin.masyarakat.pdf', ['masyarakats' => $masyarakats]);
        // return $pdf->download('Masyarakat-' . $date . '.pdf');
        return view('admin.masyarakat.pdf-preview', compact('title', 'masyarakats'));
    }


    // excel
    public function masyarakatExcel()
    {
        $date = date('d-M-Y');
        return Excel::download(new MasyarakatsExport, 'Masyarakat-' . $date . '.xlsx');
    }


    // filter umur
    public function pemilih()
    {
        $data = Masyarakat::all();
        $title = "Pemilih";
        return view('admin.masyarakat.pemilih', compact('data', 'title'));
    }



    // domPDF
    public function skTidakMampu(Request $request)
    {
        $masyarakat = Masyarakat::firstWhere('id', $request->id);
        $date = date('d/M/Y');
        // return view('admin.masyarakat.sk-tidak-mampu', compact('date', 'masyarakat'));
        $pdf = PDF::loadView('admin.masyarakat.sk-tidak-mampu', ['masyarakat' => $masyarakat]);
        return $pdf->download('Sk-Tidak Mampu-' . $masyarakat->nama . '-' . $masyarakat->nik . '-' . $date . '.pdf');
    }
}
