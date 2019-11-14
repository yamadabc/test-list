@extends('layouts.app')

@section('content')
<div class='row'>
<div class='col-md-10 offset-md-1'>
<h1>社員一覧</h1>

<table class='table table-bordered table-sm'>
    <tr>
        <th class='text-center'>名前</th>
        <th class='text-center'>かな</th>
        <th class='text-center'>BCメールアドレス</th>
        <th class='text-center'>Gmailアドレス</th>
        <th class='text-center'>携帯番号</th>
        <th class='text-center'>部署</th>
        <th class='text-center'>役職</th>
        <th class='text-center'>プロフィール画像</th>
        
        <th class='text-center'>ログインID</th>
        <th class='text-center'>最終ログイン</th>
    </tr>
    <tr>
    @foreach($users as $user)
        <td class='text-center'><a href="{{ url('/users', $user->id) }}">{{ $user -> name }}</a></td>
        <td class='text-center'>{{ $user ->how_to_read }}</td>
        <td class='text-center'>{{ $user ->email }}</td>
        <td class='text-center'>{{ $user -> gmail }}</td>
        <td class='text-center'>{{ $user -> phone_no }}</td>
        
        
        <td class='text-center'>{{ $user -> depart }}</td>
        <td class='text-center'>{{ $user -> post }}</td>
        <td class='text-center'> 
            <img src="/uploads/{{ $user->file_name }}">
        </td>
        <td class='text-center'>{{ $user -> email }}</td>
        <td class='text-center'>{{ $user -> last_login_at }}</td>
    </tr>
    @endforeach
</table>
</div>
</div>



@endsection