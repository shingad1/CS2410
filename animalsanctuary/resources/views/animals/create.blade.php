@extends('layouts.app')
<!-- define the content section -->
@section('content')
<!--A view which is used to create an animal database record; insert all of the corresponding values-->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Create an new Animal</div>
        <br>
        <!-- display the errors-if there are any, then list them.-->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div><br /> @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
        <!-- define the form which the user inputs data into -->
        <div class="card-body">
          <form class="form-horizontal" method="POST"
          action="{{url('animals') }}" enctype="multipart/form-data">
<!-- CSRF Protection token --> 
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<!-- Labels and input types upon which the user views and inputs data into -->
          <div class="col-md-8">
            <br>
            <label >Name</label>
            <input type="text" name="name"
            placeholder="name" />
          </div>
          <div class="col-md-8">
            <br>
            <label>DOB: </label>
            <input type="date" name="DOB"
            placeholder="yyyy/mm/dd" />
          </div>
          <div class="col-md-8">
            <br>
            <label >Description</label>
            <textarea rows="1" cols="50" name="description"> Animal description </textarea>
            </div>
            <div class="col-md-8">
              <br>
              <label> Availability </label>
              <select name="availability">
                <option value="available"> Available </option>
                <option value="not available"> Not Available </option>
              </select>

              <br>
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

            <div class="col-md-8">
              <br>
            <label>Picture</label>
            <input type="file" name="picture" />
          </div>

            <div class="col-md-6 col-md-offset-4">
              <br>
               <a href="{{ url('animals')}}" class="btn btn-primary"> Go back to list </a>
              <input type="submit" class="btn btn-primary" />
              <input type="reset" class="btn btn-primary" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
