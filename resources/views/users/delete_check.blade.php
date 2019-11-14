@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-text'>本当に{{ $user->name }}を削除してよろしいですか？</h5>
                        <div class='btn-toolbar'>
                            <div class='btn-group'>
                                {!! Form::open(['route'=> ['users.destroy', $user -> id ], 'method' => 'delete']) !!}
                                    {!! Form::submit('はい、実行します',['class'=> 'btn btn-outline-danger']) !!}
                                {!! Form::close() !!}
                            
                                {!! link_to_route('users.show','いいえ、実行しません',[$user->id],['class'=>'btn btn-outline-primary']) !!}
                            </div>
                        </div>
                </div>
        
            </div>
    </div>
</div>

@endsection