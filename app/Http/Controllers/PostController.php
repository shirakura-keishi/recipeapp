<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Recipe;
use App\User;

class PostController extends Controller
{
    public function add(Request $request)
    {
        return view('create.add');
    }
    public function create(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'user_id' => $request->user_id,
            'ingredient' => $request->ingredient,
            'description' => $request->description,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ];
        DB::table('recipes')->insert($param);
        return redirect('/recipe');
    }
}
