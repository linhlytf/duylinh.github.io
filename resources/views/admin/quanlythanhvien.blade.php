@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Tổng số lượng thành viên: {{ count($soluong) }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            <form action="{{route('themthanhvien')}}" method="get" class="beta-form-checkout">
                <button type="submit" class="btn btn-primary">Thêm thành viên</button>
            </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="background-color: white;">
                        
	<div id="content">
		<table id="customer" class="table">
           @if(Session::has("thongbao"))
                <div class="alert alert-success">{{Session::get("thongbao")}}</div>
                @endif
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Email</th>                          
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Loại thành viên</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center"><strong>{!! $user->id !!}</strong></td>
                                <td class="text-center"><strong>{!! $user->full_name !!}</strong></td>
                                
                                <td class="text-center"><strong>{!! $user->email !!}</strong></td>
                                <td class="text-center"><strong>{!! $user->phone !!}</strong></td>
                                <td class="text-center"><strong>{!! $user->address !!}</strong></td>
                                <td class="text-center"><strong>{!! $user->user_type !!}</strong></td>          <td class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-success" href="{{route('suathanhvien',$user->id)}}">Cập nhật</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa thành viên này?')" href="{!! URL::route('xoathanhvien', $user->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{$users->links()}}</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection