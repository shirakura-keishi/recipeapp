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

<form action="/recipe/search" method="post">  
    @csrf 
    <table align="center">
        <td><select name="item">
            <option value="name">レシピ名</option>
            <option value="ingredient">材料</option>
        </select></td>        
        <td><input type="text" name="searchward"></td>
        <td><input type="submit" value="検索する"></td></tr>
    </table>    
</form>

@if($msg != NULL)
{{$msg}}
@endif

<table align="center">
    <tr>
        <th>id</th>
        <th>recipe_name</th>
        <th>poster</th>
        <th>comments</th>
        <th>access</th>
        <th>rate</th>
        <th>date1</th>
        <th>date2</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td><a href="/recipe/{{$item->id}}">{{$item->recipe->name}}</a></td>
        <td>{{$item->recipe->user->name}}</td>
        <td>{{$item->comments_count}}</td>
        <td>{{$item->access_count}}</td>
        <td>@php echo number_format($item->rate,1); @endphp</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
    </tr>
    @endforeach
</table>

@if(Auth::check())
<a href="/myrecipe">マイページへ</a>
@endif

@endsection


@section('footer')
copyright 2022 kaichi.
@endsection