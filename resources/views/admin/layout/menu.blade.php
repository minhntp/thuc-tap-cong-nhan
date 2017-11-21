<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('getDashboard') }}">
                    <i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
            </li>
            <li>
                <a href="#">
                    <i class="glyphicon glyphicon-gift nav_icon"></i>Đơn hàng
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('getOrder') }}">
                            <i class="fa fa-check-square nav_icon"></i>Đã duyệt</a>
                    </li>
                    <li>
                        <a href="{{ route('getWaitingOrder') }}">
                            <i class="fa fa-spinner nav_icon"></i>Đang chờ</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ route('getTheLoai') }}" id="test">
                    <i class="fa fa-folder-open nav_icon"></i>Thể loại
                </a>
            </li>
            <li>
                <a href="{{ route('getSanPham') }}">
                    <i class="fa fa-shopping-cart nav_icon"></i>Sản phẩm
                </a>
            </li>
            <li>
                <a href="{{ route('getSlide') }}">
                    <i class="fa fa-caret-square-o-right nav_icon"></i>Slide
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bullhorn nav_icon"></i>Xu hướng
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('getBanChay') }}">
                            <i class="fa fa-fire nav_icon"></i>Bán chạy</a>
                    </li>
                    <li>
                        <a href="{{ route('getHangMoi') }}">
                            <i class="fa fa-star nav_icon"></i>Hàng mới</a>
                    </li>
                    <li>
                        <a href="{{ route('getSuaXuHuong') }}">
                            <i class="fa fa-pencil-square-o nav_icon"></i>Sửa mô tả</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ route('getAdmin') }}">
                    <i class="fa fa-user nav_icon"></i>Admin
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users nav_icon"></i>Khách hàng
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info nav_icon"></i>Thông tin cửa hàng
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

@section('script')
<script>
    // Hàm hỗ cho biết link hiện tại
    $(document).ready(function () {
        var link = $('#side-menu li a');
        var url = window.location.href;
        link.each(function (index) {
            if ($(this).attr('href') == url) {
                $(this).addClass('current');
            }
        })
    })
</script> @stop