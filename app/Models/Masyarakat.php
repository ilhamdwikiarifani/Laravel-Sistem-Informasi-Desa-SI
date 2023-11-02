<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['keluarga', 'agama'];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id');
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
