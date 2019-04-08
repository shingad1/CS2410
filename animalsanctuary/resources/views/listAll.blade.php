<table>
  <thead>
    <tr>
      <th> id </th>
      <th> name </th>
      <th> DOB </th>
      <th> description </th>
      <th> availability </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($animals as $animal)
      <tr>
        <td> {{ $animal->id }} </td>
        <td> {{ $animal->name }} </td>
        <td> {{ $animal->DOB }} </td>
        <td> {{ $animal->description }} </td>
        <td> {{ $animal->availability }} </td>
      </tr>
    @endforeach
  </tbody>
</table>
