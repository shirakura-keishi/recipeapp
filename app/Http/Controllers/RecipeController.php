<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request,$id){
        $user = Auth::user();
        $people = User::all();
        $item = Recipe::where('id',$id)->first();
        $param = ['item' => $item,'people' => $people,'user' => $user];
        return view('recipe.data',$param);
    }
}
