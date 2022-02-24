@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Tổng số lượng sản phẩm: {{ count($soluong) }}</h6>
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
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Loại sản phẩm</th>                          
                            <th class="text-center">Giá</th>
                            <th class="text-center">Giá khuyến mãi</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center"><strong>{!! $product->id !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->name !!}</strong></td>
                                <td class="text-center"><strong>
                                    <?php $loaisanpham = DB::table('type_products')->where('id',$product->id_type)->first(); ?>
                                    @if (!empty($loaisanpham->name))
                                    {!! $loaisanpham->name !!}
                                    @else
                                    {!! NULL !!}
                                    @endif</strong></td>
                                <td class="text-center"><strong>{!! $product->unit_price !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->promotion_price !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->unit !!}</strong></td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-success" href="{{route('suasanpham',$product->id)}}">Cập nhật</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa sản phẩm này?')" href="{!! URL::route('xoasanpham', $product->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{$products->links()}}</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection