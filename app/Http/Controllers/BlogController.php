<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
//turim ussiusinti modeli butinai
use App\Post;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class BlogController extends Controller
{
    //sitas metodas grazina pradini puslapi
    public function index(){

        //puslapiavimas
//        $posts = Post::paginate(5);

        $posts = DB::table('posts')
            ->join('categories', 'posts.category', '=', 'categories.id')
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'categories.category', 'categories.id')
            ->orderByDesc('posts.created_at')
            ->paginate(5);


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
            'category' => 'required'
        ]);

        //kreipiames i modeli ir irasom i database
        Post::create([
            //key title ka gauname is formos
            'title'=>request('title'),
            'category'=>request('category'),
            'body'=>request('body')
        ]);

        return redirect('/');
    }

    public function showAllPost (Post $post){


        return view ('blog_theme/pages/post', compact('post'));
    }

    public function editPost (Post $post) {

        $options = Category::all();

        $post = DB::table('posts')
            ->join('categories', 'posts.category', '=', 'categories.id')
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'categories.category')
            ->where('posts.id', $post->id)
            ->get();


        return view ('blog_theme/pages/edit', compact('post','options'));
    }

    //request reikalingas norint duomenis gauti is formos

    public function storeUpdate(Request $request, Post $post) {

        Post::where('id',$post->id)->update($request->only(['title','category','body']));

        //nukreipia po issaugojimo i posta pilna
        return redirect('/post/'.$post->id);

    }

    public function delete(Post $post){

        $post->delete();

        return redirect('/');
    }
}
