<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
@if(! isset($cv))
	{{$cd=""}}
	{{$cr=""}}
	{{$cv=""}}
	{{$dt=""}}
@endif
@if(! isset($tb))
	{{$tb=""}}
@endif
<div class="container">
	<form action="{{route('bai02')}}" method="post">
		{{csrf_field()}}
	<table class="table table-dark" style="font-size:20pt">
		<tr>
			<td>Nhập chiều dài</td>
			<td><input type="text" name="chieudai" value="{{$cd}}"></td>
		</tr>
		<tr>
			<td>Nhập chiều rộng</td>
			<td><input type="text" name="chieurong" value="{{$cr}}"></td>
		</tr>
		<tr>
			<td>Chu vi</td>
			<td><input type="text" name="chuvi" value="{{$cv}}" class="nedisable" disabled/></td>
		</tr>
		<tr>
			<td>Diện tích</td>
			<td><input type="text" name="dientich" value="{{$dt}}" class="nedisable" disabled/></td>
		<tr align="center">
			<td colspan="2"><input type="submit" name="tinh" value="Thực hiện tính"></td>
		</tr>
	</table>
	</form>
	<div style="font-size: 20pt;color: red">
		{!!$tb!!}
	</div>
</div>
</body>
</html>