@extends('layouts.recipeapp')
@section('title','レシピサイト')
@section('menubar')
@parent
コメント投稿
@endsection

@section('content')
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
<br>

<form action="/recipe/{{$id}}/comment/add" method="post">
    <table align="center">
        @csrf
        <tr>
            <th>評価</th>
            <td><input type="number" name="rate" min=1 max=5></td>
        </tr>
        <tr>
            <th>コメント </th>
            <td><textarea name="comment" cols="150" rows="10"></textarea></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="投稿する"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copyright 2022 kaichi.
@endsection