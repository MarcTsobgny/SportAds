<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index($id){
        $editor=User::where('id',$id)->first();
        $posts=Post::where('user_id',$id)->get();
        // dd($editor);
        
        // dd($posts);

        return view('editor',[
            "editor" => $editor,
            "posts" => $posts
        ]);
    }

    public function deleteEditor($id){
        
        $posts=Post::where("user_id",$id)->get();
        //deletePost suprime les likes,comment,image
        foreach ($posts as $post) {
            # code...
      app('App\Http\Controllers\PostController')->deletePost($post->id);
       
        }
        $editor=User::where('id',$id)->first();
        $editor->delete();

        return redirect()->route('home')->with('success', 'Editeur a été supprimer .');
    }
}
