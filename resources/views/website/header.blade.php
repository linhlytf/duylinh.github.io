<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> An Thạnh - Bến Lức - Long An</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 094 277 1285</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="{{route('doithongtin',Auth::user()->id)}}">Chào bạn {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('dangky')}}">Đăng kí</a></li>
                        <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('trangchu') }}" id="logo"><img src="source/image/product/logo.jpg" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="key" id="key" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if (
                            Session::has('cart')) 
                            {{ session('cart')->totalQty }} Sản Phẩm @else Trống
                            @endif) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">

                                @if(Session::has('cart'))

                                @foreach($product_cart as $product)
                                <div class="cart-item">
                                    <div class="pull-right">
                                        <a href="{{ route('xoagiohang', $product['item']['id']) }}"><i
                                            class="fa fa-times"></i></a>
                                            <a href="{{ route('themgiohang', $product['item']['id']) }}"><i
                                                class="fa fa-plus"></i></a>
                                            </div>
                                            <div class="media">
                                                <a class="pull-left" href="#"><img
                                                    src="{{ asset('source/image/product/' . $product['item']['image']) }}"
                                                    alt=""></a>
                                                    <div class="media-body">
                                                        <span class="cart-item-title">{{ $product['item']['name'] }}</span>
                                                        <span class="cart-item-amount">{{ $product['qty'] }}*@if ($product['item']['promotion_pric'] = 0)
                                                            {{ number_format($product['item']['unit_price']) }}
                                                            @else {{ number_format($product['item']['unit_price']) }}
                                                        @endif</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="cart-caption">
                                                <div class="cart-total text-right">Tổng tiền: <span
                                                    class="cart-total-value">{{ number_format(Session('cart')->totalPrice) }}</span>
                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="center">
                                                    <div class="space10">&nbsp;</div>
                                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i
                                                        class="fa fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div> <!-- .cart -->

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- .container -->
                        </div> <!-- .header-body -->
                        <div class="header-bottom" style="background-color: #0277b8;">
                            <div class="container">
                                <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                                    <i class="fa fa-bars"></i></a>
                                    <div class="visible-xs clearfix"></div>
                                    <nav class="main-menu">
                                        <ul class="l-inline ov">
                                            <li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                                            <li><a href="/" onclick="return false;">Sản phẩm</a>
                                                <ul class="sub-menu">
                                                    @foreach ($type_products as $pp)
                                                    <!--truyen id-->
                                                    <li><a href="{{ route('loaisanpham', $pp->id) }}">{{ $pp->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                                            <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </nav>
                                </div> <!-- .container -->
                            </div> <!-- .header-bottom -->
</div> <!-- #header -->