@extends('admin.layout.index') 
@section('content')

            <div class="col-md-12 graphs">
                <div class="xs">
                    <h3>Thể loại</h3>
                    @if(session('thongbao'))
                        <div class="alert alert-success" role="alert">
                             <strong>Well done!</strong>{{session('thongbao')}}    
                        </div>
                    @endif

                    <div class="col-md-5">
                        <a href="{{ route('getThemTheLoai') }}"><button type="button" class="btn btn-warning warning_22">Thêm mới</button></a>
                    </div>
                    <div class="col-md-7">
                        <form action="#" method="GET">
                            {{ csrf_field() }}
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
                                        <th>Tên không dấu</th>
                                        <th>Hình</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($theloai as $key=>$itemTheLoai)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $itemTheLoai->ten }}</td>
                                            <td>{{ $itemTheLoai->tenKhongDau }}</td>
                                            <td>
                                                <img src="{{ url('/upload/') }}/{{ $itemTheLoai->hinh }}" title="" width="100">
                                            </td>
                                            <td>
                                                <a href="{{ route('getSuaTheLoai', ['id'=>$itemTheLoai->id]) }}">
                                                    <i class="fa fa-pencil"></i>Sửa</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('getXoaTheLoai', ['id'=>$itemTheLoai->id]) }}">
                                                    <i class="fa fa-trash-o"></i>Xóa</a>
                                            </td>                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@stop
    