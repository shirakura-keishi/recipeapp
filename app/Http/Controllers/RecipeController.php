<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class RecipeController extends Controller
{
    public function index(){
        $user = Auth::user();
        //$user = User::all();
        return view('recipe.index',['user' => $user]);
    }
}
