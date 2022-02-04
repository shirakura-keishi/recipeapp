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
    <tr><th>id</th><th>name</th><th>user_name</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="/myrecipe/{{$item->id}}">{{$item->name}}</td>
            <td>{{$item->user->name}}</td>
    @endforeach
</table>
<p><a href="/recipe/add">レシピを作る</a></p>

@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif
    <p>Hello</p>
@endsection


@section('footer')
copyright 2022 kaichi.
@endsection

