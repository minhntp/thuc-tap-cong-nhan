@extends('admin.layout.index') 
@section('content')

    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Sản phẩm mới</h3>
            @if(session('thongbao'))
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong>{{session('thongbao')}}    
                </div>
            @endif
            <div class="col-md-5">
                <a href="{{ route('getThemSanPham') }}"><button type="button" class="btn btn-warning warning_22">Thêm mới</button></a>
            </div>
            <div class="col-md-7">
                <form action="#" method="GET">
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
                                <th>#</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Kích thước</th>
                                <th>Thông tin</th>
                                <th>Hàng mới</th>
                                <th>Cấp độ bán chạy</th>
                                <th>Thể loại</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $key=>$itemSanPham)
                                @if($itemSanPham->hangMoi)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $itemSanPham->ten }}</td>
                                    <td>
                                        <img src="{{ url('/upload/') }}/{{ $itemSanPham->hinh1 }}" title="" width="100">
                                    </td>
                                    <td>{{ $itemSanPham->kichThuoc }}</td>
                                    <td class="thong-tin"><span class="ellipsis">{{ $itemSanPham->thongTin }}</span></td>
                                    <td>
                                        @if($itemSanPham->hangMoi)
                                            {{ 'Đúng' }}
                                        @else
                                            {{ 'Không' }}
                                        @endif   
                                    </td>{{ $itemSanPham->banChay }}<td>
                                    </td>
                                    <td>{{ $itemSanPham->theloai->ten }}</td>
                                    <td>
                                        <a href="{{ route('getSuaSanPham', ['id'=>$itemSanPham->id]) }}">
                                            <i class="fa fa-pencil"></i>Sửa</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('getXoaSanPham', ['id'=>$itemSanPham->id]) }}">
                                            <i class="fa fa-trash-o"></i>Xóa</a>
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

