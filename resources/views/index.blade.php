@extends('layouts.app')

@section('content')

@foreach($files as $file)
<div class='card shadow'>
    <div class='card-body'>
        <img src="/uploads/{{ $file->filename }}" class="img-fluid img-thumbnails">
    </div>
</div>
@endforeach

@endsection