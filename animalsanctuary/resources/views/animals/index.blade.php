@extends('layouts.app')
@section('content')
<!-- CSRF Protection -->
{!! csrf_field() !!}
<!-- The admin view of all animals, allows them to view the various attributes of the animal, as well as performing actions such as
viewing the animal details, editing the animal details, viewing which user owns each animal, and deleting an animal -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <center> <b> <u> <div class="card-header">Display all animals</div> </b> </u> </center>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>DOB</th>
                <th>type</th>
                <th>description</th>
                <th>picture</th>
                <th>availability</th>
                <th>owner </th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
<!-- Iterates through each animal in the animal database, and retrives the attributes for each animal to display -->
              @foreach($animals as $animal)
              <tr>
                <td>{{$animal['id']}}</td>
                <td>{{$animal['name']}}</td>
                <td>{{$animal['DOB']}}</td>
                <td>{{$animal['type']}}</td>
                <td>{{$animal['description']}}</td>
                <td><center><img style="width:100%;height:100%" src="{{asset('storage/images/'.$animal->picture)}}"></center></td>
                <td>{{$animal['availability']}}</td>
<!-- Get the users where the adoption animalId attributes is the same as the $animal id attribute and the adopted field is accepted -->
                <?php
                $username="";
                $adoption = $adoptions->where('animalId', '=', $animal->id)->where('adopted', '=', 'accepted')->first();
//If the adoption is not null, then get the appropriate user, and the username of that user
                if ($adoption != null) {
                  $userId = $adoption->userId;
                  $user = $users->where('id', '=', $userId)->first();
                  $username = $user->username;
                }
                ?>
<!-- If the username is not null - i.e. we have a user then display a button which directs to the user page-->
                @if($username != "")
                <td><a href="{{action('AnimalController@viewuser', $user->id)}}" class="btn btn-primary">
                    {{$username}} </a>
                 </td>
                @else
                <td> No owner avilable </td>
                @endif
<!-- Routes to the show animal page, based on the animal's ID -->
                <td><a href="{{route('showanimal', $animal['id'])}}" class="btn
                  btn- primary">Details</a></td>

                  <td><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
                    btn- warning">Edit</a></td>
                    <td>

                      <form action="{{action('AnimalController@destroy', $animal['id'])}}"
                      method="post">
<!-- CSRF Protection -->
                      <meta name="csrf-token" content="{{ csrf_token() }}" />
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <br>

            </table>
            <center> <a href="{{ route('animals.create') }}" class="btn btn-primary"> Add another animal </a> </center>
            <br>
            <center>  <a href="{{ route('requests') }}" class="btn btn-primary"> View Requests </a> </center>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
