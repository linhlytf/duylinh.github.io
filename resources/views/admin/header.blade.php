<div id="header" style="background-color: white;">
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

    <div class="space30">&nbsp;</div>
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="/" onclick="return false;">Sản phẩm</a>
                        <ul class="sub-menu">
                           
                        </ul>
                    </li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="contacts.html">Liên hệ</a></li>
                    @if(Auth::check())
                    @if(Auth::user()->user_type==1)
                    <li><a href="contacts.html">Quản lý</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('quanlysanpham')}}">Quản lý sản phẩm</a></li>
                            <li><a href="{{route('quanlyloaisanpham')}}">Quản lý loại sản phẩm</a></li>
                            <li><a href="{{route('quanlythanhvien')}}">Quản lý thành viên</a></li>
                            <li><a href="{{route('quanlydonhang')}}">Quản lý đơn hàng</a></li>
                        </ul>
                    </li>
                    @endif
                    @endif
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
