@extends('layouts.app')

@section('content')



@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors -> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-6 offset-3">
    <div class='card text-center'>
    <div class='card-header'>
        <h2>プロフィール画像編集ページ</h2>
    </div>

    {!! Form::model($user,['route' =>['update_image',$user->id],'method'=>'put','files'=> true, 'enctype'=>'multipart/form-data']) !!}

        <div class='card-body form-group'>
            
            @if($user -> file_name)
            <img src="/uploads/{{ $user -> file_name }}">
            @endif
            {!! Form::file('file_name',['class'=>'mt-3']) !!}<br>
            @error('file_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {!! Form::submit('登録する',['class'=>'btn btn-primary mt-5']) !!}
            {!! Form::close() !!}

            {!! link_to_route('users.index','社員一覧に戻る',[],['class'=>'btn btn-success mt-5']) !!}
        </div>
    </div>
</div>

@endsection