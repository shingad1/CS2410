@extends('layouts.app')
@section('content')
<!-- CSRF Protection --> 
{!! csrf_field() !!}

<!-- Show the attributes of a single user -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display User </div>
        <div class="card-body">
          <table class="table table-striped">
            <center>
            <thead>
              <tr>
                <th>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>Email</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$users['id']}}</td>
                <td>{{$users['firstname']}}</td>
                <td>{{$users['lastname']}} </td>
                <td>{{$users['email']}}</td>
              </tr>
              </tbody>
              <br>
            </center>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
