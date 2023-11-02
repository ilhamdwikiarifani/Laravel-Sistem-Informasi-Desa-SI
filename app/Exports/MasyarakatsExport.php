<?php

namespace App\Exports;

use App\Models\Masyarakat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasyarakatsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Masyarakat::all();
        $masyarakats = DB::table('masyarakats')
            ->join('agamas', 'agamas.id', '=', 'masyarakats.agama_id')
            ->join('keluargas', 'keluargas.id', '=', 'masyarakats.keluarga_id')
            ->select('masyarakats.nik', 'masyarakats.nama', 'agamas.nama as agama', 'masyarakats.jenis_kelamin', 'masyarakats.tempat_lahir', 'masyarakats.tanggal_lahir', 'masyarakats.status', 'masyarakats.pendidikan_terakhir', 'keluargas.kepala_keluarga as kepala_keluarga')
            ->get();

        return $masyarakats;
    }

    // buat judul kolom
    public function headings(): array
    {
        return ["Nomor Induk Kependudukan", "Nama Lengkap", "Agama", "Jenis Kelamin", "Tempat Lahir", "Tanggal Lahir", "Status", "Pendidikan Terakhir", "Kepala Keluarga"];
    }
}
