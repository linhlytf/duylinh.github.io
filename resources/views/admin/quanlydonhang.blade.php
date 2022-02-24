@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Tổng đơn hàng: {{ count($soluong) }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <form action="{{route('themsanpham')}}" method="get" class="beta-form-checkout">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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
                            <th class="text-center">Người đặt hàng</th>
                            <th class="text-center">Ngày đặt hàng</th>                          
                            <th class="text-center">Thanh toán</th>
                            <th class="text-center">Hình thức</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <td class="text-center"><strong>{!! $bill->id !!}</strong></td>
                                <td class="text-center"><strong>
                                    <?php $customer = DB::table('customer')->where('id',$bill->id_customer)->first(); ?>
                                    @if (!empty($customer->name))
                                    {!! $customer->name !!}
                                    @else
                                    {!! NULL !!}
                                    @endif</strong></td>
                                <td class="text-center"><strong>{!! $bill->date_order !!}</strong></td>
                                <td class="text-center"><strong>{!! $bill->total !!}</strong></td>
                                <td class="text-center"><strong>{!! $bill->payment !!}</strong></td>
                                <td class="text-center"><strong>{!! $bill->note !!}</strong></td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-success" href="{{route('chitietdonhang',$bill->id)}}">Chi tiết</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa sản phẩm này?')" href="{!! URL::route('xoasanpham', $bill->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{$bills->links()}}</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection