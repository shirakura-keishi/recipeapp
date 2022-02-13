@extends('layouts.recipeapp')
@section('title','レシピサイト')
@section('menubar')
@parent
レシピ編集
@endsection

@section('content')
<form action="/myrecipe/update/{{$form->id}}" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>料理名: </th>
            <td><input type="text" name="name" value="{{$form->name}}"></td>
        </tr>
        <tr>
            <th>材料: </th>
            <td><input type="text" name="ingredient" value="{{$form->ingredient}}"></td>
        </tr>
        <tr>
            <th>作り方: </th>
            <td><textarea name="description" cols="10000" rows="6">{{$form->description}}</textarea></td>
        </tr>
        <tr>
            <th>created_at: </th>
            <td><input type="text" name="created_at" value="{{$form->created_at}}" disabled></td>
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
<a href="/myrecipe">保存せずマイページへ戻る</a>
@endsection

@section('footer')
copyright 2022 kaichi.
@endsection

