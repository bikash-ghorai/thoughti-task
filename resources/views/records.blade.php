<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Records</title>
</head>
<body>
<table>
  <tr>
    <th>Ids</th>
    <th>Colour</th>
    <th>Disposition</th>
  </tr>
  @foreach($records as $record)
  <tr>
    <td>{{$record['id']}}</td>
    <td>{{$record['color']}}</td>
    <td>{{$record['disposition']}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>