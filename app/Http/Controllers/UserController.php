<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;
use App\Post;
use App\Comment;
use App\Admin;

class UserController extends Controller
{

    public function my_recipe(Request $request){
        $user = Auth::user();
        $posts = Post::all();
        $post_check = 0;
        $items = Recipe::where('user_id',$user->id)->get();
        $param = ['items' => $items,'posts' => $posts, 'post_check' => $post_check,'user' => $user];
        return view('recipe.recipe',$param);
    }
    
    public function userlist(Request $request){
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

    public function admin(Request $request){
        $user = Auth::user();
        $admins = Admin::all();
        $admin_check = 0;
        foreach($admins as $admin){
            if($admin->email == $user->email){//emailはなぜかnull
                $admin_check = 1;
            }
        }
        $param = ['user' => $user,'admin_check' => $admin_check];
        return view('user.admin',$param);
    }

}
