<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function masyarakat(){
        return $this->hasMany(Masyarakat::class);
    }
}
