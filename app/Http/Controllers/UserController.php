<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //metodas kuris grazina pradini puslapi

    public function index(){
        return view('welcome');
    }

    //kreipiames is route i kpontroleri, mato, kad reikalaujam view sablono ir ji grazina
    public function users (){

        $students = [
            'Ieva',
            'Vika',
            'Erika'
        ];

//cia vietoj var_dump laravel'i naudojam
//dd($students);
        return view('users', compact('students'));
    }
}
