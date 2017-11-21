@extends('admin.layout.index') 
@section('content')

<div class="col-md-12 graphs">
        <a href="{{ route('getAdmin') }}"><button class="btn-info btn">Trở lại</button></a>
        <div class="xs">
            <h3>Sửa admin {{ $admin->ten }}</h3>
            
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

            <form action="{{ route('postSuaAdmin', ['id'=>$admin->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên Admin</label>
                    <div class="col-sm-8">
                        <input type="text" name="ten" class="form-control1" id="focusedinput" value="{{ $admin->ten }}" placeholder="Tên Admin...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" disabled="" name="email" class="form-control1" id="focusedinput" value="{{ $admin->email }}" placeholder="Email...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="checkbox" class="col-sm-2 control-label">Đổi password</label>
                    <div class="col-sm-8">
                        <div class="checkbox-inline">
                            <label>
                                <input type="checkbox" id="changePassword" name="changePassword">Tick vào nếu đổi</label>
                        </div>
                        <p class="help-block">Password hiện tại là: {{ $admin->password }}</p>									
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Password mới</label>
                    <div class="col-sm-8">   
                        <input type="password" disabled="" name="password" class="form-control1 password" id="focusedinput" placeholder="Password mới...">             
                    </div>
                </div>
                <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Nhập lại password mới</label>
                        <div class="col-sm-8">   
                            <input type="password" disabled="" name="passwordAgain" class="form-control1 password" id="focusedinput" placeholder="Nhập lại Password mới...">             
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="exampleInputFile">Hình</label>
                    <div class="col-sm-8">
                        <input type="file" id="file" name="hinh">
                        <output id="list"><img src="{{ url('/upload/') }}/{{ $admin->hinh }}" title="" width="150"></output>
                        <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-8">
                        <input type="date" name="ngaySinh" class="form-control1" id="focusedinput" value="{{ $admin->ngaySinh }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                        <input type="text" name="diaChi" class="form-control1" id="focusedinput"  value="{{ $admin->diaChi }}" placeholder="Số nhà, thành phố...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                    <input type="text" name="soDienThoai" class="form-control1" value="{{ $admin->soDienThoai }}" placeholder="0xxx..." onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Cấp độ</label>
                    <div class="col-sm-8">
                        <select name="level" id="selector1" class="form-control1">
                            <option 
                            @if($admin->level == 1)
                                {{"selected"}}
                            @endif
                            value="1">Cấp 1</option>
                            <option 
                            @if($admin->level == 2)
                                {{"selected"}}
                            @endif
                            value="2">Cấp 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Vị trí</label>
                    <div class="col-sm-8">
                        <input type="text" name="viTri" class="form-control1" id="focusedinput" value="{{ $admin->viTri }}" placeholder="...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Thông tin thêm</label>
                    <div class="col-sm-8">
                        <input type="text" name="thongTin" class="form-control1" value="{{ $admin->thongTin }}" id="focusedinput" placeholder="...">
                    </div>
                </div>
                <div class="col-sm-2">   
                </div>
                <div class="col-sm-8"><button class="btn-success btn">Sửa</button></div>
            </form>
        </div>
    </div>

@stop

@section('script')
<script>
    $(document).ready(function () {
        //======================== show image ======================//
        if (window.FileReader) {
            function handleFileSelect(evt) {
                var files = evt.target.files;
                var f = files[0];
                var reader = new FileReader();

                reader.onload = (function (theFile) {
                    return function (e) {
                        document.getElementById('list').innerHTML = ['<img src="', e.target.result, '" title="', theFile.name, '" width="150"/>'].join('');
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }
        document.getElementById('file').addEventListener('change', handleFileSelect, false);
        //======================== Change password======================//
        $("#changePassword").change(function () {
            if ($(this).is(":checked")) {
                $(".password").removeAttr('disabled');
            }
            else {
                $(".password").attr('disabled', '');
            }
        });
    });
</script>
@stop
