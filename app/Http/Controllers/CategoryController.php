<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory(){

        return view('blog_theme.pages.add-category');
    }

    public function saveCategory(Request $request)
    {
        $validateData = $request->validate([
            'category' => 'required|unique:categories|max:25',
        ]);

        Category::create([
            'category' => request('category')
        ]);

        return redirect('/');
    }

    public function showCategories(){

        $categories = Category::all();

        return view('blog_theme.pages.categories', compact('categories'));
    }

    public function delete(Category $category){

        $category->delete();

        return redirect('/categories');
    }

    public function selectOne (Category $category){

        $items= DB::table('categories')
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'categories.category', 'users.name')
            ->where('categories.id',$category->id)
            ->paginate(3);

//        return redirect('/categories',compact('items'));

        return view('blog_theme.pages.selected-category', compact('items'));
    }

}
