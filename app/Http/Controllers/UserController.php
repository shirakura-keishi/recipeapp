<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;
use App\Post;
use App\Comment;

class UserController extends Controller
{

    public function my_recipe(Request $request){
        $user = Auth::user();
        $posts = Post::all();
        $post_check = 0;
        $people = User::all();//無くても可
        $items = Recipe::where('user_id',$user->id)->get();
        $param = ['items' => $items,'posts' => $posts, 'post_check' => $post_check, 'people' => $people,'user' => $user];
        return view('recipe.recipe',$param);
    }
    
    public function userlist(Request $request){
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

}
