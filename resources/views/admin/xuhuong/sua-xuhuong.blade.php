@extends('admin.layout.index') 
@section('content')

            <div class="col-md-12 graphs">
                <a href="{{ route('getBanChay') }}"><button class="btn-info btn">Trở lại</button></a>
                <div class="xs">
                    <h3>Sửa xu hướng</h3>
                    
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh no!</strong>{{$error}}
                            </div>
                        @endforeach
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success" role="alert">
                             <strong>Well done!</strong>{{session('thongbao')}}    
                        </div>
                    @endif

                    <form action="{{ route('postSuaXuHuong') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Mô tả hàng mới</label>
                            <div class="col-sm-8">
                                <input type="text" name="moTaHangMoi" class="form-control1" id="focusedinput" placeholder="Mô tả tối đa 30 ký tự">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Mô tả sự bán chạy</label>
                            <div class="col-sm-8">
                                <input type="text" name="moTaBanChay" class="form-control1" id="focusedinput" placeholder="Mô tả tối đa 30 ký tự">
                            </div>
                        </div>
                        <div class="col-sm-2">   
                        </div>
                        <div class="col-sm-8"><button class="btn-success btn">Sửa</button></div>
                    </form>
                </div>
            </div>

@stop