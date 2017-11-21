@extends('admin.layout.index') 
@section('content')

    <div class="col-md-12 graphs">
        <div class="xs">
             @if($page==1)
            <h3>Đơn Hàng đã duyệt</h3>
            @endif
             @if($page==0)
            <h3>Đơn Hàng đang chờ</h3>
            @endif
             @if($page==2)
            <h3>Kết quả tìm kiếm</h3>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong>{{session('thongbao')}}    
                </div>
            @endif

            <div class="col-md-5">
                <a href="{{ route('getThemSanPham') }}"><button type="button" class="btn btn-warning warning_22">Thêm mới</button></a>
            </div>
            <div class="col-md-7">
                <form action="{{ route("getSearchOrder") }}" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control1 input-search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- Input Group -->
                </form>
            </div>


            <div class="clearfix"> </div>
            <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                <div class="panel-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr class="warning">
                                <th>Mã đơn đặt hàng</th>
                                <th>Mã khách hàng</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Tình trạng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ nhận hàng</th>
                                <th>Số điện thoại</th>
                                <th>Thông tin</th>
                                <th>Ngày mua</th>
                                 @if($page)
                                <th>Xóa</th>
                                 @else
                                <th>Đã duyệt?</th>          
                                @endif 
                                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $key=>$itemDonHang)
                              @if($itemDonHang->tinhTrang==$page)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $itemDonHang->id }}</td>
                                    <td>{{ $itemDonHang->idKhachHang }}</td>
                                    <td>
                                        {{ $itemDonHang->giaTien }}
                                    </td>
                                    <td>@if($itemDonHang->tinhTrang)
                                            {{ 'Đã duyệt' }}
                                        @else
                                            {{ 'Chưa duyệt' }}
                                        @endif </td>
                    
                                    <td>{{ $itemDonHang->ten }}</td>
                                    
                                    <td>{{ $itemDonHang->diaChi }}</td>
                                
                                    <td>{{ $itemDonHang->soDienThoai }}</td>
                                    
                                    <td>{{ $itemDonHang->thongTin }}</td>
                                   
                                    <td>
                                        @if($itemDonHang->tinhTrang)
                                            <a href="{{ route('getDeleteOrder', ['id'=>$itemDonHang->id]) }}">
                                            <i class="fa fa-trash-o"></i>Xóa</a>
                                        @else
                                           <a href="{{ route('getDaDuyet', ['id'=>$itemDonHang->id]) }}">
                                            <i class="fa fa-select-o"></i>Chọn</a>
                                        @endif
                                        
                                    </td>   
                                </tr>
                              @endif  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
