<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jumlah', 'keterangan', 'waktu'];

    public function dana_masuks()
    {
        return $this->hasMany(DanaMasuk::class);
    }
    public function dana_keluars()
    {
        return $this->hasMany(DanaKeluar::class);
    }
}
