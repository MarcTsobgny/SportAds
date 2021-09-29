<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\View;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Category;
use App\Rules\Uppercase;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Jobs\SendUserMailJob;
use App\Events\AddNewPostEvent;
use App\Http\Requests\PostStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\DBAL\TimestampType;
use Intervention\Image\ImageManagerStatic as ImageIn;

class PostController extends Controller
{

    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth', [
            'only' => [
                'storeComment' // Could add bunch of more methods too
            ]
        ]);
    }

    public function index()
    {
    }

    public function show($id)
    {

        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();

        // pour les suggestions
        $postCat = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->paginate(3);

        // $views = View::where([
        //     'post_id' => $post->id,
        //     'user_id' => Auth::user()->id
        // ])->first();

        // // if ( isset($views) && Auth::user()->id == $views->user_id && $post->id == $views->post_id) {
        //    dd("déja comenté");
        // }
        // else{
        // $post->view_number++;
        // $post->save();
        // }
        $post->view_number++;
        $post->save();

        return view('article', [
            'post' => $post,
            'comments' => $comments,
            'postCat' => $postCat
        ]);
    }

    public function create()
    {
        $cats = Category::all();
        return view('create', [
            'cats' => $cats
        ]);
    }


    public function store(Request $request)
    {


        $request->validate([

            // 'title' => ['required', 'unique:posts'],
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required'],

        ]);

        $filename = time() . '.' . $request->image->extension();


        $path = $request->file('image')->storeAs(
            'posts',
            $filename,
            'public'
        );
        // $image = ImageIn::make($request->file('image')->getRealPath());  
        // dd($image);
        // $image->resize(20,20);
        // $image->save();
        $image = Image::create([
            'path' => $path

        ]);
        $category = Category::find(1);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_id' => $image->id,
            'category_id' => $request->category,
            'view_number' => 0,
            'user_id' => Auth::user()->id
        ]);

        // On informe admin
        $mes = $post->title . ' publier par ' . getUser($post->user_id)->name;
        $not = Notification::create([
            'title' => 'Annoce publié',
            'content' => $mes,
            'user_id' => getAdminUser()->id,
            'post_id' => $post->id
        ]);

        // On informe le redacteur
        $mes = ' publier par Vous';
        $not = Notification::create([
            'title' => 'Nouvelle annoce publiée',
            'content' => $mes,
            'user_id' => Auth::user()->id,
            'post_id' => $post->id
        ]);


        //envoi de mail
        // event(new AddNewPostEvent($post));
        SendUserMailJob::dispatch($post);

        return redirect()->route('home')->with('success', 'Votre annonce a été postée .');
    }

    public function createCat()
    {
        return view('createCat');
    }

    public function storeCat(Request $request)
    {
        $request->validate([

            'name' => ['required', 'unique:categories'],

            'image' => ['required'],

        ]);

        $filename = time() . '.' . $request->image->extension();
        $path = $request->file('image')->storeAs(
            'images/logo',
            $filename,
            'public'
        );
        $image = Image::create([
            'path' => $path

        ]);

        $cat = Category::create([
            'name' => $request->name,
            'image_id' => $image->id
        ]);

        return redirect()->route('post.create')->with('success', 'Votre categorie a été créer.');
    }

    public function createEdit($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::all()->except($post->category_id);
        // dd($post->image_id);

        return view('postEdit', [
            'post' => $post,
            'cats' => $cats
        ]);
    }

    public function updatePost(Request $request)
    {

        $request->validate([

            'title' => ['required'],
            'content' => ['required'],

        ]);

        $image_id = $request->image_id;
        // Case image changed
        if (isset($request->image)) {
            //penser à supprimer lutard


            $filename = time() . '.' . $request->image->extension();


            $path = $request->file('image')->storeAs(
                'posts',
                $filename,
                'public'
            );

            $image = Image::create([
                'path' => $path

            ]);
            $image_id = $image->id;
        }

        $postToUpadate = Post::find($request->post_id);

        $postToUpadate->title = $request->title;
        $postToUpadate->content = $request->content;
        $postToUpadate->image_id = $image_id;
        $postToUpadate->category_id = $request->category;
        $postToUpadate->save();



        //    $post= Post::create([
        //         'title' => $request->title,
        //         'content' => $request->content,
        //         'image_id' =>$image_id,
        //         'category_id'=>$request->category,
        //         'view_number'=>0,
        //         'comment_number'=>0,
        //         'user_id' =>Auth::user()->id
        //     ]); 

        return redirect()->route('home')->with('success', 'Votre annonce a été editer .');
    }

    public function deletePost($id)
    {
        // dd("delete");
        // Storage::delete('storage/app/public/posts/1631131656.jpg');
        // unlink(storage_path('app/public/posts/1631131656.jpg'));

        $post = Post::find($id);
        $comments = DB::delete('delete  from comments where post_id = ?', [$post->id]);
        $likes = DB::delete('delete  from likes where post_id = ?', [$post->id]);


        $image = getImage($post->image_id);
        $path = $image->path;

        // Suppression dans la bd
        $image->delete();

        // Suppresion dans le STorage
        unlink(storage_path('app/public/' . $path));

        $post->delete();
        return redirect()->route('home')->with('success', 'Annonce a été supprimer .');
    }



    public function storeComment(): JsonResponse
    {

        // $request->validate([

        //     'content' => ['required'],

        // ]);

        $comment = request()->comment;

        $comment = Comment::create([
            'content' => request()->content,
            'post_id' => request()->post_id,
            'user_id' => Auth::user()->id
        ]);
        // $comment-> created_at = $comment-> created_at -> format('d/m/Y');
        // $comment-> created_at = Carbon::parse($comment->created_at)->format("Y-m-d");
        $date = Carbon::parse($comment->created_at)->diffForHumans();
        $user = getUser($comment->user_id);
        $comments = Comment::where([
            'post_id' => request()->post_id
        ])->get();
        // return response()->json(['success' => true, 'comments' =>$comments]);
        return response()->json(['success' => true, 'comment' => $comment, 'date' => $date, 'user' => $user]);
    }



    public function register()
    {

        $post = Post::find(11);
        $video = Video::find(1);

        $comment1 = new Comment(['content' => 'Mon premieer commentaire ']);
        $comment2 = new Comment(['content' => 'Mon deuxieme commentaire ']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);
        $comment3 = new Comment(['content' => 'Mon troisieme commentaire ']);

        $video->comments()->save($comment3);
    }
}
