@extends('website.layout')
@section('content')
<div class="container" >
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space20">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list" .>
                            <h4>Tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($product) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($product as $np)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="product.html"><img src="source/image/product/{{ $np->image }}"
                                                        height="250" alt="{{ $np->name }}"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $np->name }}</p>
                                                <p class="single-item-price" style="font-size: 14px">
                                                    @if ($np->promotion_price == 0)
                                                        <span class="flash-sale">{{ number_format($np->unit_price) }}
                                                            đồng</span>
                                                    @else
                                                        <span class="flash-del">{{ number_format($np->unit_price) }}
                                                            đồng</span>
                                                        <span class="flash-sale">{{ number_format($np->promotion_price) }}
                                                            đồng</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="space20">&nbsp;</div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('themgiohang',$np->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitietsanpham',$np->id)}}">Chi tiết<i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="space50">&nbsp;</div>
                            
                        </div>
                        <!-- .beta-products-list -->
                        <div class="space30">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($pro_products) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($pro_products as $pp)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <!--show hinh -->
                                                <a href="product.html"><img src="source/image/product/{{ $pp->image }}"
                                                        height="250" alt="{{ $pp->name }}"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $pp->name }}</p>
                                                <p class="single-item-price">
                                                        <span class="flash-del">{{ number_format($pp->unit_price) }}
                                                            đồng</span>
                                                            <span class="flash-sale">{{ number_format($pp->unit_price) }}
                                                            đồng</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <div class="space20">&nbsp;</div>
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitietsanpham',$pp->id)}}">Chi tiết<i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="space10">&nbsp;</div>
                            <div class="row">{!! $pro_products->onEachSide(5)->links() !!}</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection