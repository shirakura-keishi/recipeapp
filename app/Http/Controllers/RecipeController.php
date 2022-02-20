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

class RecipeController extends Controller
{
    public function index(Request $request, $id)//トップページからのレシピ詳細
    {
        $user = Auth::user();
        $post = Post::where('id', $id)->first();
        $item = Recipe::where('id', $post->recipe_id)->first();
        $comments = Comment::where('post_id', $id)->get();
        DB::table('posts')->where('id', $id)->update(['access_count' => $post->access_count + 1]);
        $purchases = PurchasedRecipe::where('post_id', $id)->get();
        $purchase_check = 3;
        if($item->user_id != $user->id){
            if($post->price > 0){
                $msg = "このレシピを閲覧するには".$post->price."ポイント必要です";
                foreach($purchases as $purchase){
                    if($purchase->user_id == $user->id){
                        $msg = "購入済みのレシピです。";
                        $purchase_check = 2;
                    }
                }
            }
            else{
                $msg = "このレシピは無料で閲覧できます。";
                $purchase_check = 0;
            }
        }
        else{
            $msg = "あなたが投稿したレシピです。";
            $purchase_check = 1;
        }
        $param = ['id' => $id, 'item' => $item, 'comments' => $comments, 'user' => $user, 'msg' => $msg, 'purchase_check' => $purchase_check];
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
        $item = Recipe::where('id', $id)->first(); 
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
        //以下の処理は改善希望
        $name = $request->searchward;
        $subject = $request->item;
        $user = Auth::user();
        $results = DB::table('recipes')->select('id')->where($subject, 'like', '%' . $name . '%')->get();
        $count = 0;
        $items = NULL;

        foreach ($results as $result) {
            if (Post::where('recipe_id', $result->id)->first()) {
                if ($count == 0) {
                    $items = Post::where('recipe_id', $result->id)->get();
                } else {
                    $items[] = Post::where('recipe_id', $result->id)->first();
                }
                $count += 1;
            }
        }
        $msg = $count . "件見つかりました";

        if ($items == NULL) {
            $items = Post::all();
            $msg = "検索条件に当てはまるものはありませんでした。レシピ一覧を表示します";
        }
        $param = ['user' => $user, 'count' => $count, 'msg' => $msg, 'items' => $items];
        return view('recipe.index', $param);
    }
}
