@extends('layouts.recipeapp')
@section('title','レシピ新規登録')
@section('menubar')
@parent
レシピ新規登録
@endsection

@section('content')
<form action="/recipe/add" method="post">
    <table>
        @csrf
        <tr>
            <th>name: </th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>user_id: </th>
            <td><input type="text" name="user_id"></td>
        </tr>
        <tr>
            <th>ingredient: </th>
            <td><input type="text" name="ingredient"></td>
        </tr>
        <tr>
            <th>description: </th>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <th>created_at: </th>
            <td><input type="text" name="created_at"></td>
        </tr>
        <tr>
            <th>updated_at: </th>
            <td><input type="text" name="updated_at"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="登録"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')

@endsection