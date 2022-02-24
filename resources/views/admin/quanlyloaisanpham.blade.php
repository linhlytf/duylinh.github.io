@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Tổng số loại sản phẩm: {{ count($soluong) }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <form action="{{route('themloaisanpham')}}" method="get" class="beta-form-checkout">
                <button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
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
                            <th class="text-center">Tên loại sản phẩm</th>
                            <th class="text-center">Mô tả</th>                          
                            <th class="text-center">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type_products as $type_product)
                            <tr>
                                <td class="text-center"><strong>{!! $type_product->id !!}</strong></td>
                                <td class="text-center"><strong>{!! $type_product->name !!}</strong></td>
                                
                                <td class="text-center"><strong><textarea height="150" readonly="readonly" disabled="disabled">{!! $type_product->description !!}</textarea></strong></td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-success" href="{{route('sualoaisanpham',$type_product->id)}}">Cập nhật</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa loại sản phẩm này?')" href="{!! URL::route('xoaloaisanpham', $type_product->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">{{$type_products->links()}}</div>
                    

	</div> <!-- #content -->
</div> <!-- .container -->
@endsection