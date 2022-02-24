@extends('website.layout')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('matb'))
						@if(Session::get('matb')=='1')
							<div class="alert alert-success">{{Session::get('noidung')}}</div>
						@else
							<div class="alert alert-danger">{{Session::get('noidung')}}</div>
						@endif
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Địa chỉ email*</label>
							<input type="email" id="email" name="email">
						</div>
						<div class="form-block">
							<label for="password">Mật khẩu*</label>
							<input type="password" id="password" name="password">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection