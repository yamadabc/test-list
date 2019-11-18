@extends('layouts.app')

@section('content')
    <div class='jumbotron'>
        <div class='conteiner'>
            <h1>株式会社Blanciel</h1><br>
            <h4>社員管理ページ</h4>
        </div>
    </div>
    <div class='text-center'>
        {!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-lg btn-outline-info']) !!} 
        {!! link_to_route('register','新入社員を迎える',[],['class' => 'btn btn-lg btn-outline-success']) !!}
    </div>

@endsection