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
    <tr><th>id</th><th>name</th><th>user_name</th><th>post_check</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="/myrecipe/{{$item->id}}">{{$item->name}}</td>
            <td>{{$item->user->name}}</td>
            @foreach($posts as $post)
                @if($post->recipe_id == $item->id)
                    @php
                    $post_check = 1;
                    @endphp
                    @break
                @endif
            @endforeach
            @if($post_check == 1)
                <td>投稿id:{{$post->id}}</td>
            @else
                <td>未投稿</td>
            @endif
        </tr>
    @php
    $post_check = 0;
    @endphp
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

