@extends('layouts.recipeapp')
@section('title','レシピ新規登録')
@section('menubar')
@parent
レシピ新規登録
@endsection

@section('content')
<form action="add" method="post">
    <table>
        @csrf
        <tr>
            <th>料理名: </th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>材料: </th>
            <td><input type="text" name="ingredient"></td>
        </tr>
        <tr>
            <th>作り方: </th>
            <td><textarea name="description" cols="10000" rows="6"></textarea></td>
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
            <td><input type="submit" value="保存する"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')

@endsection