<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;

class UserController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        //$user = User::all();
        return view('recipe.index',['user' => $user]);
    }

    public function my_recipe(Request $request){
        $user = Auth::user();
        $items = Recipe::all();
        $param = ['items' => $items,'user' => $user];
        return view('recipe.recipe',$param);
    }
    
    public function admin(Request $request){
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

}
