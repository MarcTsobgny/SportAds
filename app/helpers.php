<?php

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
function getUser($user_id){
    $user=User::find($user_id);
    return $user;
}

function getPost($id){
    return Post::find($id);
}
function getImage($image_id){
    return Image::find($image_id);
}

function getCategory($category_id){
    return Category::find($category_id);
}

function getCategories(){
    return Category::all();
}

function getCommentCount($id){
    return Comment::where('post_id',$id)->count();
}

function getNots($id){

    $nots=Notification::where('user_id',Auth::user()->id)
                        ->orderBy('created_at','DESC')->get();
    // $nbNots=$nots->count();
    return $nots;
}

function getUnReadNots($id){

    $nots=Notification::where([
        'user_id'=>Auth::user()->id,
        'read'=> 0
        ])
                        ->orderBy('created_at','DESC')->get();
    // $nbNots=$nots->count();
    return $nots;
}

function getAdminUser(){
    $user=User::where('is_admin',1)->first();
    // dd($user->name);
    return $user;
}


function isEditor($user_id){
    $user=User::find($user_id);
    $res=false;
    if ($user->is_editor) {
        $res=true;
    }
    return $res;
}

function getEditors(){
    $editors =User::where('is_editor',1)->get();
    // dd($editors);
    return $editors;
}

function getPosts($user_id){

    return Post::where('user_id',$user_id)->get();
}