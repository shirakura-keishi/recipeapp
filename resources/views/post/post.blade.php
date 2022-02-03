@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
    @parent
    トップページ
@endsection

@section('content')

@if(Auth::check())
<p>USER: {{$user->name . ' (' . $user->email . ')'}}でログインしています。</p>

<table>
    <tr>
        <th>料理名</th>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <th>登録者</th>
        <td>{{$item->getData()}}</td>
    </tr>
    <tr>
        <th>材料</th>
        <td>{{$item->ingredient}}</td>
    </tr>
    <tr>
        <th>作り方</th>
        <td>{{$item->description}}</td>
    </tr>
</table>

<form action="/recipe/post/{{$item->id}}" method="post">
@csrf
<input type="submit" value="投稿する">
</form>
@endif

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection
