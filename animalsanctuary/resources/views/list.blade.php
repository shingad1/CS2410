<table>
  <thead>
    <th> </th>
    <th> </th>
    <th> </th>
    <th> </th>
  </tr>
</thead>
<tbody>
  @foreach ($animals as $animal)
  <tr>
      <td> {{ $animal-> id }} </td>
      <td> {{ $animal-> name }} </td>
      <td> {{ $animal-> DOB  }} </td>
      <td> {{ $animal-> description }} </td>
      <td> {{ $animal-> availability }} </td>
  </tr>
  @endforeach
</tbody>
</table>
