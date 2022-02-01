@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
    @parent
    ユーザ一覧
@endsection

@section('content')
<table>
    <tr><th>id</th><th>name</th><th>user_name</th></tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
    @endforeach
</table>

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection