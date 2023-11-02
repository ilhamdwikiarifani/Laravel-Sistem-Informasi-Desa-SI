<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use DB;
use App\Models\Dana;

use App\Models\Post;
use App\Models\DanaMasuk;
use App\Models\DanaKeluar;
use App\Models\Masyarakat;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //chart
        $masyarakat = Masyarakat::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
        // return $masyarakat;
        $tahun = date('Y');
        $jmts = Masyarakat::whereYear('created_at', (date('Y') - 1))->count();
        $jms = Masyarakat::whereYear('created_at', date('Y'))->count();
        $tampilTahunSebelum = Masyarakat::whereYear('created_at', '<=', (date('Y') - 1))->count();
        // data
        $jumlahMasyarakat = Masyarakat::count();
        //
        $persenS = ($jmts / $tampilTahunSebelum) * 100;
        $persen = ($jms / $jumlahMasyarakat) * 100;
        $persen = round($persen, 0, PHP_ROUND_HALF_EVEN);
        $persenS = round($persenS, 0, PHP_ROUND_HALF_EVEN);

        $danaMasuk = DanaMasuk::sum('jumlah');
        $danaKeluar = DanaKeluar::sum('jumlah');

        // views
        $v = views(Post::class)->count();
        $title = "Dashboard";
        return view(
            'admin.dashboard',
            compact('v','title', 'danaMasuk', 'danaKeluar', 'jumlahMasyarakat', 'masyarakat', 'tahun', 'jmts', 'persen', 'tampilTahunSebelum', 'persenS')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
