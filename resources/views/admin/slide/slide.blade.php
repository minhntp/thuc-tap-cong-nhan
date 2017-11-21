@extends('admin.layout.index') 
@section('content')
<div class="col-md-12 graphs">
                <div class="xs">
                    <h3>Slide</h3>
                    @if(session('thongbao'))
                        <div class="alert alert-success" role="alert">
                             <strong>Well done!</strong>{{session('thongbao')}}    
                        </div>
                    @endif
                    <div class="col-md-5">
                        <a href="{{ route('getThemSlide') }}"><button type="button" class="btn btn-warning warning_22">Thêm mới</button></a>
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
                                        <th>Hình</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Mô tả dài</th>
                                        <th>Link</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slide as $key=>$itemSlide)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>
                                            <img src="{{ url('/upload/') }}/{{ $itemSlide->hinh }}" title="" width="300">
                                        </td>
                                        <td>{{ $itemSlide->moTaNgan }}</td>
                                        <td>{{ $itemSlide->moTaDai }}</td>
                                        <td>{{ $itemSlide->link }}</td>                                                                             
                                        <td>
                                            <a href="{{ route('getSuaSlide', ['id'=>$itemSlide->id]) }}">
                                                <i class="fa fa-pencil"></i>Sửa</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('getXoaSlide', ['id'=>$itemSlide->id]) }}">
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
<!-- /#page-wrapper -->
@stop
