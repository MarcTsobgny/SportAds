<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
