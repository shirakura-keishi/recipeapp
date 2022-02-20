<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Recipe;
use App\Post;
use App\Comment;
use App\PurchasedRecipe;
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

    public function purchase(Request $request,$id){
        $buyer = Auth::user();
        $buyer_id = $buyer->id;
        $buyer_balance = $buyer->balance;
        $item = Post::where('id',$id)->first();
        $poster_id = $item->recipe->user_id;
        $poster_balance = $item->recipe->user->balance;
        $price = $item->price;
        $param = [
            'user_id' => $buyer_id,
            'post_id' => $id,
        ];
        if($buyer_balance >= $price){
            DB::table('purchased_recipes')->insert($param);
            DB::table('users')->where('id', $buyer_id)->update(['balance'=>$buyer_balance-$price]);
            DB::table('users')->where('id', $poster_id)->update(['balance'=>$poster_balance+$price]);
            echo '投稿ID'.$id.'購入できました！';
            return redirect('/recipe');
        
        }
        else{
            echo '残高が不足しています。';
            return redirect('/recipe');
        }
    }
}
