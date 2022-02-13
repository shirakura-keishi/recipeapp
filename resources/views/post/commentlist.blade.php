@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
@parent
マイページ
@endsection

@section('content')
@if(Auth::check())
<p>USER: {{$user->name . ' (' . $user->email . ')'}}でログインしています。</p>
<table>
    <tr>
        <th>id</th>
        <th>recipe_name</th>
        <th>poster</th>
        <th>commenter</th>
        <th>comment</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->post->recipe->name}}</td>
        <td>{{$item->post->recipe->user->name}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->comment}}</td>
    </tr>
    @endforeach
</table>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif

<a href="/recipe">トップページへ</a>

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection