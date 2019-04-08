<!DOCTYPE html>
<html>
  <head>
    <title> Animal: {{ $animal->Name }} </title>
  </head>
  <body>
    <h1> Animal ID: {{ $animal->id }} </h1>
    <ul>
      <li> Animal Description: {{ $animal->description }} </li>
      <li> Animal DOB: {{ $animal-> DOB }} </li>
      <li> Animal Availability: {{ $animal-> availability }} </li>
    </ul>
  </body>
</html>
