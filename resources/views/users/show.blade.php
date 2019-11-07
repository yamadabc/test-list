@extends('layouts.app')

@section('content')

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
    <td class='text-center'></td>
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
    <th class='text-center'>ログインPW</th>
    <td class='text-center'>{{ $user -> password }}</td>
</tr>
<tr>
    <th class='text-center'>ログインID</th>
    <td class='text-center'>{{ $user -> email }}</td>
</tr>
<tr>
    <th class='text-center'>最終ログイン</th>
    <td class='text-center'></td>
</tr>

</table>

{!! link_to_route('users.edit','編集',[$user->id],['class' => 'btn btn-primary btn-lg']) !!}
{!! Form::open(['route'=> ['users.destroy', $user -> id ], 'method' => 'delete']) !!}
    {!! Form::submit('削除',['class'=> 'btn btn-danger btn-lg']) !!}
{!! Form::close() !!}

@endsection