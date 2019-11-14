@extends('layouts.app')

@section('content')
    <div class='text-center'>
        {!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-lg btn-outline-info']) !!} 
    </div>

@endsection