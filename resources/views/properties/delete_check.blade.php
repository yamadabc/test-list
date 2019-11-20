@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        
            <div class='card'>
                <div class='card-body text-center'>
                    <h5 class='card-text'>本当に{{ $property->property_name }}を削除してよろしいですか？</h5>
                        <div class='btn-toolbar'>
                            <div class='btn-group'>
                                {!! Form::open(['route'=> ['properties.destroy', $property -> id ], 'method' => 'delete']) !!}
                                    {!! Form::submit('はい、実行します',['class'=> 'btn btn-outline-danger']) !!}
                                {!! Form::close() !!}
                            
                                {!! link_to_route('properties.show','いいえ、実行しません',[$property->id],['class'=>'btn btn-outline-primary']) !!}
                            </div>
                        </div>
                </div>
        
            </div>
    </div>
</div>

@endsection