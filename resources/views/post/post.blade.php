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

@foreach($posts as $post)
@if($post->recipe_id == $item->id)
@php
$post_check = 1;
break;
@endphp
@endif
@endforeach

<form action="/myrecipe/edit/{{$item->id}}" method="post">
    @csrf
    <input type="submit" value="編集する">
</form>

@if ($post_check != 1)
<form action="/recipe/post/{{$item->id}}" method="post">
    @csrf
    <input type="submit" value="投稿する">
</form>
<form action="/myrecipe/delete/{{$item->id}}" method="post">
    @csrf
    <input type="submit" value="削除する">
</form>
@else
<p>このレシピは投稿済みです。</p>
<form action="/myrecipe/cancel/{{$post->id}}" method="post">
    @csrf
    <input type="submit" value="投稿を削除する">
</form>
@endif
@endif
<a href="/myrecipe">マイページへ戻る</a>
@endsection


@section('footer')
copyright 2022 kaichi.
@endsection