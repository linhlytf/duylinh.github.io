<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<base href="{{asset('')}}" />
	<style>
		.header{background-color: rgb(0, 73, 64); color: white; padding: 10px;}
		.footer{font-size: 20px; text-align: center; background-color: #ddd; padding: 20px;}
	</style>
</head>
<body>
<div class="container">
	<div class="header">
		<div style="font-size: 30px">LARAVEL CƠ BẢN</div>
		<div style="font-size: 20px">Hướng dẫn lập trình web từ cơ bản đến nâng cao</div>
	</div>
	<div class="row" style="min-height: 580px; margin-top: 10px">
		<div class="col-md-3">
		<ul>
			<li><a href="trangchu">Trang Chủ</a></li>
			<li><a href="trangchu/html">Học HTML</a></li>
			<li><a href="trangchu/css">Học CSS</a></li>
			<li><a href="trangchu/javascript">Học JavaScript</a></li>
			<li><a href="trangchu/php">Học PHP</a></li>
			<li><a href="trangchu/mysql">Hoc MySQL</a></li>
			<li><a href="trangchu/jquery">Học Jquery</a></li>
		</ul>
	</div>
	<div class="col-md-9">
		@yield("content")
	</div>
</div>
<div class="footer">
	&copy; 2021 Duy Linh
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
