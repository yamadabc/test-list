@extends('layouts.app')

@section('content')

<h1>社員登録ページ</h1>

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
    <div class="col-6">
    {!! Form::model($user ,['route' => 'users.store']) !!}

        <div class='form-group'>
            {!! Form::label('name', '名前') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            {!! Form::text('name',old('name'), ['class'=>'form-control']) !!}
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('how_to_read','ふりがな') !!}
            {!! Form::text('how_to_read', old('how_to_read'), ['class' => 'form-control']) !!}
            @error('how_to_read')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('email','BCメールアドレス') !!}
            {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
            <small text='muted'>*ログイン用メールアドレス</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('gmail','Gmailアドレス') !!}
            {!! Form::email('gmail',old('gmail'),['class'=>'form-control']) !!}
            @error('gmail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('phone_no','携帯電話') !!}
            {!! Form::text('phone_no',old('phone_no'),['class' => 'form-control']) !!}
            @error('phone_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('depart','部署') !!}
            @php
                $depart_loop =[
                '代表取締役'=>'代表取締役',
                '不動産投資営業部'=>'不動産投資営業部',
                'システム開発部'=>'システム開発部',
                '不動産経営戦略部'=>'不動産経営戦略部',
                '不動産営業戦略部'=>'不動産営業戦略部',
                '経営企画室'=>'経営企画室',
                '退職'=>'退職',
                ];
            @endphp
            {!! Form::select('depart',$depart_loop, old('depart'),['class'=>'form-control']) !!}
            @error('depart')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class='form-group'>
                {!! Form::label('post','役職') !!}
                {!! Form::text('post',old('post'),['class'=>'form-control']) !!}
                @error('post')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class='form-group'>
                {!! Form::label('password','パスワード') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
                <small text='muted'>*8文字以上</small>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class='form-group'>
                {!! Form::label('password_confirmation','パスワード確認用') !!}
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                @error('post')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        

        {!! Form::submit('登録',['class'=> 'btn btn-primary btn-block mt-3']) !!}
        {!! Form::close() !!}
    </div>
    
</div>
@endsection