@extends('layouts.app')
@section('content')
<!--Displays a table of the requests that the user has made -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="panel panel-default">
              <div class="card">
                <br>
                <b> <center> <div class="card-header">Your own Requests</div> </center> </b>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                  </br>
<!-- Displays a table of the Details of the animal that the user has requested -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> AnimalID </th>
                                <th> Pet Name </th>
                                <th> Outcome </th>
                                <th> Type </th>
                                <td> Image </td>
                            </tr>
                        </thead>
                        <tbody>
<!-- Iterates through each adoption passed into the controller, and then finds thte associating animal to that particular adoption -->
                          @foreach($adoptions as $adoption)
                          @foreach($animals as $animal)
                          @if($adoption->userId == $userId)
                          @if($adoption->userId == $userId && $adoption->animalId == $animal->id)
<!-- Displays the attributes to be shown on the table -->
                          <tr>
                              <td> {{$adoption->id}} </td>
                              <td> {{$adoption->name}} </td>
                              <td> {{$adoption->adopted}} </td>
                              <td> {{$animal->type}} </td>
                              <td><center><img style="width:15%;height:15%" src="{{asset('storage/images/'.$animal->picture)}}"></center></td>
                          </tr>
                          @endif
                          @endif
                          @endforeach
                          @endforeach
                          </tbody>
                        </table>
                        <center> <a href="{{ route('display_animal') }}" class="btn btn-primary"> Available Pets </a> </center>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endsection
