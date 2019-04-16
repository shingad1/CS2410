@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Request Made</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Your Request has been made!
                    <br/>
                    <a href="{{ route('home') }}" class="btn btn-primary"> Return to home </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
