@extends('layouts.app')
@section('content')

<!-- The pending adoption page that an admin user would see. -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="panel panel-default">
              <div class="card">
                <br>
                <b> <center> <div class="card-header">All Requests </div> </center> </b>
<!-- Sets the class value using php tags -->
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                  </br>
<!-- Table for displaying the animal attributes, and Approved drop down menu to set whether the animal will be accepted, rejected or pending -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> AnimalID </th>
                                <th> Pet Name </th>
                                <th> Type </th>
                                <th> Image </th>
                                <th> Outcome </th>
                                <th> UserID </th>
                                <th> Approve? </th>
                            </tr>
                        </thead>
<!-- Table body which iterates through each adoption row in the adoptions table, and adds those values onto the table -->
<!-- Also iterates through each animal and uses the following 'if' statement to select the corresponding animals which are also put up for adoption.-->
                        <tbody>
                            @foreach($adoptions as $adoption)
                            @foreach($animals as $animal)
                            @if($adoption->animalId == $animal->id)
                            <tr>
                                <td> {{$adoption->animalId}} </td>
                                <td> {{$adoption->name}} </td>
                                <td> {{$animal->type}} </td>
                                <td><center><img style="width:50%;height:50%" src="{{asset('storage/images/'.$animal->picture)}}"></center></td>
                                <td> {{$adoption->adopted}} </td>
                                <td> {{$adoption->userId }} </td>
                                <td>
<!--References the update method in the RequestController which handles what to do with the form date. -->
                                  <form method="POST" class="form-horizontal" action="{{ action('RequestController@update',
                                  $adoption->id) }}" enctype="multipart/form-data">
<!-- Allows to make partial changes to an existing resource -->
                                  {!! method_field('patch') !!}
<!-- CSRF token for CSRF Protection -->
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <select name="adopted">
                                    <option value="pending">Pending</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="rejected">Rejected</option>
                                  </select>
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                          </tbody>
                        </table>
                        <center>
<!-- Buttons to go back to the list of animals, or check which pets are available -->
                         <a href="{{ url('animals')}}" class="btn btn-primary"> Go back to list </a>
                       </center>
                       <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endsection
