<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   protected  $fillable=['title','content','user_id','post_id'];
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }
}
