@extends('layouts.app')

@section('content')
<!-- The page that the user sees when they log in --> 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <a href="{{ route('display_animal') }}" class="btn btn-primary"> Display animals </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
