@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success">
                  {{ session('status') }}
               </div>
               @endif
               <table class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr>
                        <th> name</th>
                        <th> date-of-birth </th>
                        <th> description no</th>
                        <th> availability </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($animals as $animal)
                     <tr>
                        <td> {{$animal->name}} </td>
                        <td> {{$animal->DOB}} </td>
                        <td> {{$animal->description}} </td>
                        <td> {{$animal->availability}} </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
