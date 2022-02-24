@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Cập nhật thành viên: {!! $thanhvien->full_name !!}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <form action="{{route('quanlysanpham')}}" method="get" class="beta-form-checkout">

            </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="background-color: white;">
                        
    <div id="content">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="{{route('doithongtin',$thanhvien->id)}}">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập họ và tên" value="{!! $thanhvien->full_name !!}">
                                        @if($errors->has('full_name'))
                                        <label style="color: red">{{$errors->first('full_name')}}</label>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="email" value="{!! $thanhvien->email !!}" placeholder="Nhập email" disabled >                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="address" value="{!! $thanhvien->address !!}" placeholder="Nhập address" >
                                        @if($errors->has('address'))
                                            <label style="color: red">{{$errors->first('address')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" class="form-control" id="phone" value="{!! $thanhvien->phone !!}" placeholder="Nhập số điện thoại" >
                                        @if($errors->has('phonel'))
                                            <label style="color: red">{{$errors->first('phone')}}</label>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                <br>
                                <div class="center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                    

    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
