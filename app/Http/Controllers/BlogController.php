<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//turim ussiusinti modeli butinai
use App\Post;
use Psy\Util\Str;

class BlogController extends Controller
{
    //sitas metodas grazina pradini puslapi
    public function index(){

        //puslapiavimas
        $posts = Post::paginate(5);

        return view('blog_theme.pages.home',compact('posts'));
    }

    public function addPost(){ // / add-post

        $options = [
            'Maistas',
            'Kelionės',
            'Namai'
            ];

        return view('blog_theme.pages.add-post',compact('options'));
    }
//cia darom lauku validacija
    public function store (Request $request){
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
}
