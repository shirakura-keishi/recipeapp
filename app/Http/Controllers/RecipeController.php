<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Recipe;
use App\Post;

class RecipeController extends Controller
{
    public function index(Request $request,$id){
        $user = Auth::user();
        $people = User::all();
        $item = Recipe::where('id',$id)->first();
        $post = Post::where('recipe_id',$id)->first();
        DB::table('posts')->where('recipe_id',$id)->update(['access_count'=>$post->access_count+1]);
        $param = ['item' => $item,'people' => $people,'user' => $user];
        return view('recipe.data',$param);
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

    public function edit(Request $request,$id)
    {
        $item =DB::table('recipes')->where('id',$id)->first();
        return view('create.edit',['form'=>$item]);
    }

    public function update(Request $request,$id)
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
        DB::table('recipes')->where('id',$id)->update($param);
        return redirect('/myrecipe');
    }

    public function delete(Request $request,$id)
    {
        DB::table('recipes')->where('id',$id)->delete();
        return redirect('/myrecipe');
    }

    public function post_cancel(Request $request,$id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return redirect('/myrecipe');
    }
}