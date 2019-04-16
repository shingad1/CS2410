@extends('layouts.app')
@section('content')
<!-- The user display of all animals that are available for adoption. -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <center> <div class="panel-heading">Dashboard</div> </center>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
<!-- Set the filter option -->
                <form method="GET" action="{{action('AnimalController@display')}}">

                    <label> Type </label>
                    <select name="filter">
                      <option value=""> All Animal Types </option>
                      <option value="cat"> Cat </option>
                      <option value="dog"> Dog </option>
                      <option value="reptile"> Reptile </option>
                      <option value="frog"> Frog </option>
                      <option value="turtle"> Turtle </option>
                      <option value="insect"> Insect </option>
                    </select>
                    <input type="submit" name="submit" value="Filter" class="btn btn-primary">
                  </div>
                  <br>
                </form>


                    <center> You are logged in! </center>

                    <br>
<!-- Display the animals available for adoption --> 
                    <b> Animals Available for adoption: </b>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th><center> Picture </center> </th>
                                <th>Request an adoption</th>
                            </tr>

                        </thead>
                        <tbody>

<!-- Iterate through each animal and get it's attributes -->
                            @foreach($animals as $animal)
                            <?php $requested = false; ?>
                            @if($animal->availability == 'available' && ($animal->type == $filter || $filter ==""))
                            <tr>
                                <td> {{$animal->name}} </td>
                                <td> {{$animal->DOB}} </td>
                                <td> {{$animal->type}} </td>
                                <td> {{$animal->description}} </td>
                                <td><center><img style="width:50%;height:50%" src="{{asset('storage/images/'.$animal->picture)}}"></center></td>
                                <td>
                                @foreach($adoptions as $adoption)
                                @if($adoption->userId == $userId && $adoption->animalId == $animal->id)
                                Request is being processed...
                                <?php $requested = true; ?>
                                @endif
                                @endforeach
                                @if($requested == false)
                                <form method="POST" class="form-horizontal" action="{{url('adoptions')}}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="userId" value="{{ $userId }}" />
                                    <input type="hidden" name="animalId" value="{{ $animal->id }}" />
                                    <input type="hidden" name="name" value="{{ $animal->name }}" />
                                    <input type="submit" class="btn btn-primary" value="Adopt this animal" />
                                </form>
                                @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                  <center>  <a href="{{ route('userrequests') }}" class="btn btn-primary"> View Requests </a> </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
