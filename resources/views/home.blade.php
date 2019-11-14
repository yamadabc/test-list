@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!</br>

                    {!! link_to_route('users.index', '社員一覧',[],['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
