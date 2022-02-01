<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        //$user = User::all();
        return view('recipe.index',['user' => $user]);
    }

    public function my_recipe(){
        $user = Auth::user();
        $items = Recipe::all();
        return view('recipe.recipe',['items' => $items],['user' => $user]);
    }

}
