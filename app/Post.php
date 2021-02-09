<?php

namespace App;

use App\Http\Controllers\BlogController;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = [
        'title',
        'body',
        'category',
        'img'
    ];

}
