@extends('website.layout')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
				@if(Session::has("thongbao"))
				<div class="alert alert-success">{{Session::get("thongbao")}}</div>
				@endif
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ email*</label>
							<input type="email" id="email" name="email">
							@if($errors->has('email'))
							<label style="color: red">{{$errors->first('email')}}</label>
							@endif
						</div>

						<div class="form-block">
							<label for="fullname">Họ và tên*</label>
							<input type="text" id="fullname" name="fullname">
							@if($errors->has('fullname'))
							<label style="color: red">{{$errors->first('fullname')}}</label>
							@endif
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" value="" name='address'>
							@if($errors->has('address'))
							<label style="color: red">{{$errors->first('address')}}</label>
							@endif
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="phone">
							@if($errors->has('phone'))
							<label style="color: red">{{$errors->first('phone')}}</label>
							@endif
						</div>
						<div class="form-block">
							<label for="password">Mật khẩu*</label>
							<input type="password" id="phone" name="password">
							@if($errors->has('password'))
							<label style="color: red">{{$errors->first('password')}}</label>
							@endif
						</div>
						<div class="form-block">
							<label for="re_password">Nhập lại nhập khẩu*</label>
							<input type="password" id="re_password" name="re_password">
							@if($errors->has('re_password'))
							<label style="color: red">{{$errors->first('re_password')}}</label>
							@endif
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection