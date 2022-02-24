@extends('admin.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thêm loại sản phẩm mới</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <form action="{{route('quanlyloaisanpham')}}" method="get" class="beta-form-checkout">
                <button type="submit" class="btn btn-primary">Quản lý loại sản phẩm</button>
            </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="background-color: white;">
                        
    <div id="content">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="{{route('themloaisanpham')}}">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên loại sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
                                        @if($errors->has('name'))
                                            <label style="color: red">{{$errors->first('name')}}</label>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Mô tả..." ></textarea>
                                        @if($errors->has('description'))
                                            <label style="color: red">{{$errors->first('description')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                    

    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
