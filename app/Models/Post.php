<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


// vsitors
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;


class Post extends Model implements Viewable
{

    use HasFactory, InteractsWithViews;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id', 'foto', 'published_at'];
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
