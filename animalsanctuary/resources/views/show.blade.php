<!DOCTYPE html>
<!-- Show the attributes of an animal --> 
<html>
  <head>
    <title> Animal: {{ $animal->Name }} </title>
  </head>
  <body>
    <h1> Animal Name: {{ $animal-> name }} </h1>
    <ul>
      <li> Animal ID: {{ $animal-> id }} </li>
      <li> Animal Description: {{ $animal->description }} </li>
      <li> Animal DOB: {{ $animal-> DOB }} </li>
      <li> Animal Availability: {{ $animal-> availability }} </li>
    </ul>
  </body>
</html>
