<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanaMasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'dana'];

    public function dana()
    {
        return $this->belongsTo(Dana::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
