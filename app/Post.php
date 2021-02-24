<?php

namespace App;

use App\Http\Controllers\BlogController;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
//apsirasom, kurie laukai bus uzpildyti formoje ir keliaus i DB

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'img',
        'user_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
