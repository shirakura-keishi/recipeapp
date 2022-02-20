@extends('layouts.recipeapp')

@section('title','レシピサイト')

@section('menubar')
    @parent
    ユーザ一覧
@endsection

@if($admin_check == 1)
<p>あなたは管理者です</p>
@else
<p>あなたは管理者ではありません</p>
@endif

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection