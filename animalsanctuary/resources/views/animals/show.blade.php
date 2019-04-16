@extends('layouts.app')
@section('content')
<!-- Shows the details of the current animal -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
<!-- Display the relevant attributes of the animal -->
        <div class="card-header">Display {{$animal->name}}</div>
        <div class="card-body">
          <table class="table table-striped" border="1" >
            <tr> <td> <b>id</th> <td> {{$animal['id']}}</td></tr>
              <tr> <th>name</th> <td>{{$animal->name}}</td></tr>
              <tr> <th>DOB</th> <td>{{$animal->DOB}}</td></tr>
              <tr> <th>type</th> <td>{{$animal->type}}</td></tr>
              <tr> <th>description </th> <td style="max-width:150px;" >{{$animal->description}}</td></tr>
              <tr> <th>availability </th> <td>{{$animal->availability}}</td> </tr>
              <tr> <td> Image </th> <td> {{$animal['picture']}} </td> </tr>

              <tr> <td colspan='2' ><img style="width:100%;height:100%"
                src="{{ asset('storage/images/'.$animal->picture)}}"></td></tr>


              </table>
              <table><tr>
                <td><a href="/animals" class="btn btn-primary" role="button">Back to the list</a></td>
                <td><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
                  btn- warning">Edit</a></td>
                  <td><form action="{{action('AnimalController@destroy', $animal['id'])}}"
                    method="post">
<!-- CSRF protection --> 
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form></td>
                </tr></table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
