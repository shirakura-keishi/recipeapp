@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
    @parent
    トップページ
@endsection

@section('content')
@if(Auth::check())
<p>USER: {{$user->name . ' (' . $user->email . ')'}}でログインしています。</p>

<table align="center">
    <tr>
        <th>料理名</th>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <th>登録者</th>
        <td>{{$item->user->name}}</td>
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

<p><label>comments</label></p>
<table align="center"> 
    <tr><th>id</th><th>recipe_name</th><th>poster</th><th>commenter</th><th>comment</th></tr>
    @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->post->recipe->name}}</td>
            <td>{{$comment->post->recipe->user->name}}</td>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->comment}}</td>
        </tr>
    @endforeach
</table>


<a href="/recipe">トップページへ戻る</a>

@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection