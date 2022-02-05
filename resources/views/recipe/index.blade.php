@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
    @parent
    トップページ
@endsection

@section('content')
@if(Auth::check())
<p>USER: {{$user->name . ' (' . $user->email . ')'}}でログインしています。</p>

@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif

<table>
    <tr><th>id</th><th>recipe_name</th><th>poster</th>0<th>comments</th><th>access</th><th>date1</th><th>date2</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="/recipe/{{$item->recipe_id}}">{{$item->recipe->name}}</a></td>
            <td>{{$item->recipe->user->name}}</td>
            <td>{{$item->comments_count}}</td>
            <td>{{$item->access_count}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
        </tr>
    @endforeach
</table>

<a href="/myrecipe">マイページへ</a>

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection

