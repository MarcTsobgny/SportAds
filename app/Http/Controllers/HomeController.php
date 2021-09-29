<?php

namespace App\Http\Controllers;

use Throwable;
use PDOException;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        //  $this->middleware('admin');
    }

    public function index()
    {
        
        $nots = '';
        $nbNots = 0;
       
        // if (Auth::check()) {
        // }
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $th) {
            //throw $th;
            abort(403, 'Erreur de connection à la base de données');
        }

        try {
            //code...
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        // dd($posts);
        // return view('home', [
        //     'posts' => $posts,
        //     // 'nots' => $nots,
        //     // 'nbNots' => $nbNots
        // ]);
        return view('home', compact('posts'));
    }

    public function search(Request $request)
    {
        // dd('search invoqué');
        $words = $request->words;
        $posts = DB::table('posts')
            ->where('title', 'LIKE', "%$words%")
            ->orWhere('content', 'LIKE', "%$words%")
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json(['success' => true, 'posts' => $posts]);
    }
    public function showByCat($id)
    {
        $posts = DB::select('select * from posts where category_id = ?', [$id]);

        $posts = Post::where('category_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        //   dd($posts);
        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function cours()
    {
        return view('cours');
    }

    public function lesson()
    {
        return view('chat');
    }

    public function likePost(): JsonResponse
    {
        $post = Post::find(request()->id);
        if ($post->isLikedByLoggedInUser()) {
            $res = Like::where([
                'user_id' => Auth::user()->id,
                'post_id' => request()->id

            ])->delete();

            if ($res) {
                return response()->json([
                    'count' => Post::find(request()->id)->likes->count()
                ]);
            }
        } else {
            $like = new Like();

            $like->user_id = Auth::user()->id;
            $like->post_id = request()->id;
            $like->save();

            return response()->json([
                'count' => Post::find(request()->id)->likes->count()
            ]);
        }
    }
}
