<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
//turim ussiusinti modeli butinai
use App\Post;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;
use File;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index','showAllPost']]);
    }

    //sitas metodas grazina pradini puslapi
    public function index(){

        //puslapiavimas
//        $posts = Post::paginate(5);

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.user_id','posts.category_id', 'posts.body', 'posts.category_id',
                'users.name','posts.created_at','posts.img', 'categories.category')
            ->orderBy('posts.created_at', 'DESC')
            ->paginate(5);


//        dd($posts);
        return view('blog_theme.pages.home',compact('posts'));
    }

    public function addPost(){ // / add-post

        $options = Category::all();

        return view('blog_theme.pages.add-post',compact('options'));
    }

    public function store (Request $request){

        //cia darom lauku validacija
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category' => 'required',
            'img' => 'mimes:jpeg, jpg, png, gif|required|max:10000'
        ]);

        $path = $request->file('img')->store('public/image');
        $filename = str_replace('public/',"", $path);

//        dd(Auth::id());

        //kreipiames i modeli ir irasom i database
        Post::create([
            //key title ka gauname is formos
            'title'=>request('title'),
            'category_id'=>request('category'),
            'body'=>request('body'),
            'img' => $filename,
            'user_id'=>Auth::id()
        ]);
        return redirect('/');
    }

    public function showAllPost (Post $post){

        return view ('blog_theme/pages/post', compact('post'));
    }

    public function editPost (Post $post)
    {

        if (Gate::allows('update', $post)) {

            $options = Category::all();

            $post = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select('posts.id', 'posts.title', 'posts.img', 'posts.category_id', 'posts.body', 'posts.created_at','categories.category')
                ->where('posts.id', $post->id)
                ->get();


            return view('blog_theme/pages/edit', compact('post', 'options'));
        }
            return redirect()->back()->with(['message' => 'You can edit only your posts!', 'alert' => 'alert-danger']);

    }


    //request reikalingas norint duomenis gauti is formos

    public function storeUpdate(Request $request, Post $post) {

        if ($request->file()){
            File::delete(storage_path('app/public/'.$post->img));
            $path = $request->file('img')->store('public/image');
            $filename = str_replace('public/','', $path);
            Post::where('id', $post->id)->update(['img'=>$filename]);

        }
        Post::where('id',$post->id)->update($request->only(['title','category_id','body']));


        //nukreipia po issaugojimo i posta pilna
        return redirect('/post/'.$post->id);

    }

    public function delete(Post $post){

        if (Gate::allows('delete', $post)) {

            $post->delete();

            return redirect('/');
        }
        return redirect()->back()->with(['message' => 'You can delete only your posts!', 'alert' => 'alert-danger']);
    }
}
