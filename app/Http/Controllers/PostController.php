<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Recipe;
use App\Post;
use App\Comment;

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
        $posts = Post::all();
        $post_check = 0;
        $param = ['item' => $item,'user' => $user, 'posts'=>$posts, 'post_check' => $post_check];
        return view('post.post',$param);
    }

    public function create(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $param = [
            'recipe_id' => $id,
            'comments_count' => 0,
            'access_count' => 0
        ];
        DB::table('posts')->insert($param);
        return redirect('/recipe');
    }

    public function commentlist(Request $request)
    {
        $user = Auth::user();
        $items = Comment::all();
        $param = ['user' => $user, 'items' => $items];
        return view('post.commentlist',$param);
    }
}
