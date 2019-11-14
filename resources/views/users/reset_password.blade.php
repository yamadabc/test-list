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
        <h2>パスワード変更</h2>
    </div>

    {!! Form::model($user,['route' =>['update_password',$user->id],'method'=>'put']) !!}

        <div class='card-body'>
            <div class='form-group'>
            
                {!! Form::label('password','パスワード') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class='form-group'>
                {!! Form::label('password_confirmation','確認') !!}
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('変更する',['class'=>'btn btn-primary mt-5']) !!}
            {!! Form::close() !!}

            {!! link_to_route('users.index','社員一覧に戻る',[],['class'=>'btn btn-success mt-5']) !!}
        </div>
    </div>
</div>

@endsection