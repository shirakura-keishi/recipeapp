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

class PostController extends Controller
{
    public function index(Request $request)//トップページのデータ
    {
        $user = Auth::user();
        $items = Post::all();
        $msg = "投稿レシピ一覧";
        $param = ['user'=>$user, 'msg'=>$msg, 'items'=>$items];
        return view('recipe.index',$param);
    }

    public function post(Request $request,$id)//マイページのレシピ詳細
    {
        $user = Auth::user();
        $item = Recipe::where('id',$id)->first();
        $posts = Post::all();
        $post_check = 0;
        $param = ['item' => $item,'user' => $user, 'posts'=>$posts, 'post_check' => $post_check];
        if($user->id != $item->user_id){
            return redirect('recipe');
        }
        return view('post.post',$param);
    }

    public function create(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $param = [
            'recipe_id' => $id,
            'comments_count' => 0,
            'access_count' => 0,
            'price' => $request->price,
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

    public function comment(Request $request,$id)
    {
        $user = Auth::user();
        $post = Post::where('id',$id)->first();
        $item = Recipe::where('id',$post->recipe_id)->first();
        $param = ['id' => $id,'item' => $item,'user' => $user];
        return view('create.add_comment',$param);
    }

    public function comment_add(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $item =  Post::where('id',$id)->first();
        $rate = $request->rate;
        $rate_sum = $rate+$item->rate*$item->rate_count;
        DB::table('posts')->where('id', $id)->update(['rate_count' => $item->rate_count + 1]);
        $item = Post::where('id',$id)->first();
        $rate_ave = $rate_sum/$item->rate_count;
        DB::table('posts')->where('id', $id)->update(['rate' => $rate_ave]);

        $param = [
            'post_id' => $id,
            'user_id' => $user_id,
            'comment' => $request->comment
        ];
        DB::table('comments')->insert($param);
        return redirect('/recipe');
    }
}
