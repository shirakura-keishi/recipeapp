<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Recipe;
use App\Post;
use App\Comment;

class RecipeController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = Auth::user();
        $post = Post::where('id', $id)->first();
        $item = Recipe::where('id', $post->recipe_id)->first();
        $comments = Comment::where('post_id', $id)->get();
        DB::table('posts')->where('id', $id)->update(['access_count' => $post->access_count + 1]);
        $param = ['id' => $id, 'item' => $item, 'comments' => $comments, 'user' => $user];
        return view('recipe.data', $param);
    }

    public function add(Request $request)
    {
        return view('create.add');
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'user_id' => $user_id,
            'ingredient' => $request->ingredient,
            'description' => $request->description,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ];
        DB::table('recipes')->insert($param);
        return redirect('/myrecipe');
    }

    public function edit(Request $request, $id)
    {
        //$item = DB::table('recipes')->where('id',$id)->first();　元のwhere文
        $item = Recipe::where('id', $id)->first(); //修正後
        return view('create.edit', ['form' => $item]);
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'user_id' => $user_id,
            'ingredient' => $request->ingredient,
            'description' => $request->description,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ];
        DB::table('recipes')->where('id', $id)->update($param);
        return redirect('/myrecipe');
    }

    public function delete(Request $request, $id)
    {
        DB::table('recipes')->where('id', $id)->delete();
        return redirect('/myrecipe');
    }

    public function post_cancel(Request $request, $id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/myrecipe');
    }

    public function search(Request $request)
    {
        //SELECT * FROM posts where recipe_id in (SELECT id FROM recipes where name like '% $name %');
        //レシピ名検索
        $name = $request->searchward;
        $subject = $request->item;
        $user = Auth::user();
        $results = DB::table('recipes')->select('id')->where($subject, 'like', '%' . $name . '%')->get();
        $count = 0;
        $items = NULL;

        //レシピ数と投稿数が一致しないときにバグが発生するので修正してください↓
        foreach ($results as $result) {
            if ($count == 0) {//レコードが1つでもget()を使ってもいいのでは？
                $items = Post::where('recipe_id', $result->id)->first();
            } else {
                $items[] = Post::where('recipe_id', $result->id)->first();
            }
            $count += 1;
        }
        echo $results;
        echo $items;
        $msg = $count."件見つかりました";

        if ($items == NULL) {
            $items = Post::all();
            $msg = "検索条件に当てはまるものはありませんでした。レシピ一覧を表示します";
        }
        $param = ['user' => $user, 'count' => $count,'msg' => $msg, 'items' => $items];
        return view('recipe.index', $param);
    }
}
