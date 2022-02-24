<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
@if(! isset($kq))
	{{$kq=""}}
@endif
<div class="container">
	<table class="table table-dark" style="font-size:20pt">
		<thead class="thead-dark">...</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>2x + 10 = 0</td>
				<td><a href="{{asset('bai01/2/10')}}" class="btn btn-primary"></a>Giải</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>-3x + 8 = 0</td>
				<td><a href="{{asset('bai01/-2/8')}}" class="btn btn-primary"></a>Giải</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>0x + 00 = 0</td>
				<td><a href="{{asset('bai01/0/0')}}" class="btn btn-primary"></a>Giải</td>
			</tr>
			<tr>
				<th scope="row">4</th>
				<td>0x + 4 = 0</td>
				<td><a href="{{asset('bai01/0/4')}}" class="btn btn-primary"></a>Giải</td>
			</tr>
			<tr>
				<th scope="row">5</th>
				<td>5x - 12 = 0</td>
				<td><a href="{{asset('bai01/5/-12')}}" class="btn btn-primary"></a>Giải</td>
			</tr>
		</tbody>
		<div style="font-size:20pt; color:red; background-color:yellow; padding:5px">
			Kết quả: {{$kq}}
		</div>
	</table>
</div>
</body>
</html>