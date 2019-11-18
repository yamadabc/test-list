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
    <h2>編集ページ</h2>
    {!! Form::model($user,['route' => ['users.update', $user->id],'method'=>'put']) !!}

        <div class='form-group'>
            {!! Form::label('name', '名前') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            {!! Form::text('name',old('name'), ['class'=>'form-control']) !!}
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('how_to_read','ふりがな') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            {!! Form::text('how_to_read', old('how_to_read'), ['class' => 'form-control']) !!}
            @error('how_to_read')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('email','BCメールアドレス') !!} <span class='badge-pill badge-danger' style='margin:5px;'>必須 </span><small text='muted'>*ログイン用メールアドレス</small>
            {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('gmail','Gmailアドレス') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            {!! Form::email('gmail',old('gmail'),['class'=>'form-control']) !!}
            @error('gmail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::label('phone_no','携帯電話') !!} <span class='badge-pill badge-danger' style='margin:5px;'>必須 </span><small text='muted'>*ハイフン(-)なしで入力してください。</small>
            {!! Form::text('phone_no',old('phone_no'),['class' => 'form-control']) !!}
            @error('phone_no')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class='form-group'>
            {!! Form::label('depart','部署') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            {!! Form::radio('depart','代表取締役',old('depart'),['id'=>1]) !!}
            {!! Form::label(1,'代表取締役') !!}
            
            {!! Form::radio('depart','不動産投資営業部',old('depart'),['id'=>2]) !!}
            {!! Form::label(2,'不動産投資営業部') !!}

            {!! Form::radio('depart','システム開発部',old('depart'),['id'=>3]) !!}
            {!! Form::label(3,'システム開発部') !!}

            {!! Form::radio('depart','不動産経営戦略部',old('depart'),['id'=>4]) !!}
            {!! Form::label(4,'不動産経営戦略部') !!}

            {!! Form::radio('depart','不動産営業戦略部',old('depart'),['id'=>5]) !!}
            {!! Form::label(5,'不動産営業戦略部') !!}

            {!! Form::radio('depart','経営企画室',old('depart'),['id'=>6]) !!}
            {!! Form::label(6,'経営企画室') !!}

            {!! Form::radio('depart','退職',old('depart'),['id'=>7]) !!}
            {!! Form::label(7,'退職') !!}
            @error('depart')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class='form-group'>
                {!! Form::label('post','役職') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
                {!! Form::text('post',old('post'),['class'=>'form-control']) !!}
                @error('post')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        
        {!! Form::submit('登録',['class'=> 'btn btn-primary btn-block mt-3']) !!}
        {!! Form::close() !!}
    </div>
    
</div>
@endsection