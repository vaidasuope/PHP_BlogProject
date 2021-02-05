<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blog_theme.pages.home');
    }

    public function addPost(){ // / add-post

        $options = [
            'Maistas',
            'Kelionės',
            'Namai'
            ];
        return view('blog_theme.pages.add-post',compact('options'));
    }
}
