@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        <div class='card'>
            <div class='card-body'>
                
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='form-group'>
                        <input type="file" name="filename" id="filename">
                        <span class="text-danger">{{ $errors->first('filename') }}</span>
                    </div>
                        
            
                    <button type='submit' class='btn btn-primary'>登録する</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection