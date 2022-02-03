<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;
use App\Post;

class UserController extends Controller
{
    /*PostControllerに移動
    public function index(Request $request){
        $user = Auth::user();
        return view('recipe.index',['user' => $user]);
    }
    */

    public function my_recipe(Request $request){
        $user = Auth::user();
        $people = User::all();
        $items = Recipe::where('user_id',$user->id)->get();
        $param = ['items' => $items,'people' => $people,'user' => $user];
        return view('recipe.recipe',$param);
    }
    
    public function admin(Request $request){
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

}
