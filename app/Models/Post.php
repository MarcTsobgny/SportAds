<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content','image_id','user_id','category_id','view_number'];

        

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function image(){
        return $this->hasOne(Image::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    } 

    public function views(){
        return $this->hasMany(View::class);
    }
    
    public function isLikedByLoggedInUser(){
        return $this->likes->where('user_id',auth()->user()->id)->isEmpty() ? false :true;
    }
}
