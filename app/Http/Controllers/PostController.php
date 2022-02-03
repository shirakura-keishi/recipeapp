<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Recipe;
use App\User;
use App\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Post::all();
        $param = ['user'=>$user,'items'=>$items];
        return view('recipe.index',$param);
    }

    public function post(Request $request,$id)
    {
        $user = Auth::user();
        $item = Recipe::where('id',$id)->first();
        $param = ['item' => $item,'user' => $user];
        return view('post.post',$param);
    }

    public function create(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $param = [
            'id' => $request->id,
            'recipe_id' => $id,
            'comments_count' => 0,
            'access_count' => 0
        ];
        DB::table('posts')->insert($param);
        return redirect('/recipe');
    }
}
