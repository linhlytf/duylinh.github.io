@extends('website.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Chi tiết Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('trangchu') }}">Trang Chủ</a> / <span>Sản phẩm {{$chitietsp->name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">

                    <div class="col-sm-4">
                        @if ($chitietsp->promotion_price!=0)
                        <div class="ribbon-wrapper">
                            <div class="ribbon sale">Sale</div>
                        </div>
                        @endif
                        <img src="source/image/product/{{$chitietsp->image}}" height="250px" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$chitietsp->name}}</p>
                            <p class="single-item-price">
                                @if ($chitietsp->promotion_price == 0)
                                <span class="flash-sale">{{ number_format($chitietsp->unit_price) }}đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($chitietsp->unit_price) }}đồng</span>
                                <span class="flash-sale">{{ number_format($chitietsp->promotion_price) }}đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$chitietsp->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Tuỳ chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <a class="add-to-cart pull-left" href="#">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>Sản phẩm này chưa có mô tả </p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Chưa có đánh giá</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Các sản phẩm cùng loại</h4>

                    <div class="row">
                        @foreach ($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if ($sptt->promotion_price!=0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                @endif

                                <div class="single-item-header">
                                    <a href="{{'chitietsanpham',$sptt->id}}"><img src="source/image/product/{{$sptt->image}}" height="250px" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                        @if ($sptt->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($sptt->unit_price) }}đồng</span>
                                        @else
                                        <span class="flash-del">{{ number_format($sptt->unit_price) }}đồng</span>
                                        <span class="flash-sale">{{ number_format($sptt->promotion_price) }}đồng</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="space10">&nbsp;</div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham', $sptt->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sp_banchay as $spbc)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$spbc->id)}}"><img src="source/image/product/{{$spbc->image}}" alt=""></a>
                                <div class="media-body" style="font-size: 12px">
                                    {{$spbc->name}}
                                    <span class="beta-sales-price" style="font-size: 12px">
                                        @if ($spbc->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($spbc->unit_price) }}đồng</span>
                                        @else
                                        <span class="flash-del">{{ number_format($spbc->unit_price) }}đồng</span>
                                        <span class="flash-sale">{{ number_format($spbc->promotion_price) }}đồng</span>
                                        @endif

                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">

                            @foreach($sp_moi as $spm)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$spm->id)}}"><img src="source/image/product/{{$spm->image}}" alt=""></a>
                                <div class="media-body" style="font-size: 12px">
                                    {{$spm->name}}
                                    <span class="beta-sales-price" style="font-size: 12px">
                                        @if ($spm->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($spm->unit_price) }}đồng</span>
                                        @else
                                        <span class="flash-del">{{ number_format($spm->unit_price) }}đồng</span>
                                        <span class="flash-sale">{{ number_format($spm->promotion_price) }}đồng</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

