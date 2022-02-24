@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Cập nhật sản phẩm: {!! $sanpham->name !!}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <form action="{{route('quanlysanpham')}}" method="get" class="beta-form-checkout">
                <button type="submit" class="btn btn-primary">Quản lý sản phẩm</button>
            </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="background-color: white;">
                        
    <div id="content">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="{{route('suasanpham',$sanpham->id)}}">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên sản phẩm" value="{!! $sanpham->name !!}">
                                        @if($errors->has('name'))
                                        <label style="color: red">{{$errors->first('name')}}</label>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Loại sản phẩm</label>
                                    <div class="col-sm-9">
                                        <select name="id_type" id="id_type" class="form-control">
                                            <option value="">--Chọn loại sản phẩm--</option>
                                            <?php Select_Function($cate,$sanpham->id_type); ?>
                                        </select>
                                        @if($errors->has('id_type'))
                                            <label style="color: red">{{$errors->first('name')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Mô tả..." >{!! $sanpham->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="unit_price" class="form-control" id="unit_price" value="{!! $sanpham->unit_price !!}" placeholder="Nhập giá sản phẩm" >
                                        @if($errors->has('unit_price'))
                                            <label style="color: red">{{$errors->first('unit_price')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Giá khuyến mãi</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="promotion_price" class="form-control" id="promotion_price" value="{!! $sanpham->promotion_price !!}" placeholder="Nhập giá khuyến mãi (không khuyến mãi thì nhập 0)" >
                                        @if($errors->has('promotion_price'))
                                            <label style="color: red">{{$errors->first('promotion_price')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">New</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="new" class="form-control" id="new" value="{!! $sanpham->new !!}" placeholder="Nhập 1 nếu sản phẩm mới, 0 nếu cũ" >
                                        @if($errors->has('best'))
                                            <label style="color: red">{{$errors->first('best')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Best</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="best" class="form-control" id="best" value="{!! $sanpham->best !!}" placeholder="Nhập 1 nếu sản phẩm bán chạy, 0 nếu bình thường" >
                                        @if($errors->has('best'))
                                            <label style="color: red">{{$errors->first('best')}}</label>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Hình</label>     <img src="source/image/product/{{ $sanpham->image }}" height="250" alt="{{ $sanpham->name }}">
                                    <input type="hidden" name="oldimage" value="{!! $sanpham->image !!}">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Thay Đổi Hình</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" id="image"value="{!! old('txtSPImage') !!}" >
                                        @if($errors->has('image'))
                                            <label style="color: red">{{$errors->first('image')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="unit" class="form-control" id="unit" value="{!! $sanpham->unit !!}" placeholder="Nhập số lượng" >
                                        @if($errors->has('unit'))
                                            <label style="color: red">{{$errors->first('unit')}}</label>
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
