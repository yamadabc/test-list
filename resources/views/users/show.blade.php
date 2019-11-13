@extends('layouts.app')

@section('content')

<div class='row'>
<div class='col-md-10 offset-md-1'>
<h2>{{ $user -> name }}の詳細ページ</h2>
<table class='table table-bordered'>
<tr>
    <th class='text-center'>名前</th>
    <td class='text-center'>{{ $user->name }}</td>
</tr>
<tr>
    <th class='text-center'>かな</th>
    <td class='text-center'>{{ $user ->how_to_read }}</td>
</tr>
<tr>
    <th class='text-center'>BCメールアドレス</th>
    <td class='text-center'>{{ $user ->email }}</td>
</tr>
<tr>
    <th class='text-center'>Gmailアドレス</th>
    <td class='text-center'>{{ $user -> gmail }}</td>
</tr>
<tr>
    <th class='text-center'>携帯番号</th>
    <td class='text-center'>{{ $user -> phone_no }}</td>
</tr>
<tr>
    <th class='text-center'>プロフィール画像</th>
    <td class='text-center'><img src="/uploads/{{ $user -> file_name }}"></td>
</tr>
<tr>
    <th class='text-center'>部署</th>
    <td class='text-center'>{{ $user -> depart }}</td>
</tr>
<tr>
    <th class='text-center'>役職</th>
    <td class='text-center'>{{ $user -> post }}</td>
</tr>

<tr>
    <th class='text-center'>ログインID</th>
    <td class='text-center'>{{ $user -> email }}</td>
</tr>

</table>

@if(\Auth::id() === $user -> id)
{!! link_to_route('users.edit','編集',[$user->id],['class' => 'btn btn-primary btn-lg']) !!}
{!! link_to_route('password.email','パスワードの変更',[$user->id],['class'=>'btn btn-outline-primary btn-lg'])!!}
@endif



{!! link_to_route('users.index','社員一覧に戻る',[],['class'=>'btn btn-success btn-lg']) !!}
{!! link_to_route('delete_check','削除',[$user->id],['class'=> 'btn btn-danger btn-lg']) !!}
</div>
</div>
@endsection