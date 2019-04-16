@extends('layouts.app')
@section('content')
<!-- View which  allows the admin to edit and update the attributes for an animal -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update the animal</div>
<!-- Prints out any error messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <div class="card-body">
<!-- Attributes used in the update method of the AnimalController -->
          <form class="form-horizontal" method="POST" action="{{ action('AnimalController@update',
          $animal['id']) }} " enctype="multipart/form-data" >

          {!! method_field('patch') !!}
<!-- CSRF Protection -->
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <br>

<!-- Gets the attributes for the animal record so that the user can edit --> 
          <div class="col-md-8">
            <label >name</label>
            <input type="text" name="name" value="{{$animal->name}}"/>
          </div>

          <br>

          <div class="col-md-8">
            <label >description</label>
            <input type="text" name="description" value="{{$animal->description}}" />
          </div>

          <br>

          <div class="col-md-8">
            <label >DOB</label>
            <input type="text" name="DOB" value="{{$animal->DOB}}" />
          </div>

          <br>

          <div class="col-md-8">
            <label>Picture</label>
            <input type="file" name="picture" />
          </div>

          <br>

          <div class="col-md-8">
            <label> Availability </label>
            <select name="availability">
              <option value="available"> Available </option>
              <option value="not available"> Not Available </option>
            </select>
          </div>

          <br>

          <div class="col-md-8">
          <label> Type </label>
          <select name="type">
            <option value="cat"> Cat </option>
            <option value="dog"> Dog </option>
            <option value="reptile"> Reptile </option>
            <option value="frog"> Frog </option>
            <option value="turtle"> Turtle </option>
            <option value="insect"> Insect </option>
          </select>

        </div>

          <br>

          <div class="col-md-6 col-md-offset-4">
            <input type="submit" class="btn btn-primary" />
            <input type="reset" class="btn btn-primary" />
          </a>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection
