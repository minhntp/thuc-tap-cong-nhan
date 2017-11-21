@extends('admin.layout.index') 
@section('content')

            <div class="col-md-12 graphs">
                <a href="{{ route('getAdmin') }}"><button class="btn-info btn">Trở lại</button></a>
                <div class="xs">
                    <h3>Thêm mới admin</h3>
                    
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

                    <form action="{{ route('postThemAdmin') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Tên Admin</label>
                            <div class="col-sm-8">
                                <input type="text" name="ten" class="form-control1" id="focusedinput" value="{{ old('ten') }}" placeholder="Tên Admin...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control1" id="focusedinput" value="{{ old('email') }}" placeholder="Email...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control1" id="focusedinput" placeholder="Password...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Nhập lại Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="passwordAgain" class="form-control1" id="focusedinput" placeholder="Nhập lại Password...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Hình</label>
                            <div class="col-sm-8">
                                <input type="file" id="file" name="hinh">
                                <output id="list"></output>
                                <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" value="{{ old('ngaySinh') }}"  name="ngaySinh" class="form-control1" id="focusedinput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('diaChi') }}" name="diaChi" class="form-control1" id="focusedinput" placeholder="Số nhà, thành phố...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-8">
                            <input type="text" name="soDienThoai" class="form-control1" value="{{ old('soDienThoai') }}" placeholder="0xxx..." onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Cấp độ</label>
                            <div class="col-sm-8">
                                <select name="level" id="selector1" class="form-control1">
                                    <option value="1">Cấp 1</option>
                                    <option value="2" selected="">Cấp 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Vị trí</label>
                            <div class="col-sm-8">
                                <input type="text" name="viTri" class="form-control1" id="focusedinput" value="{{ old('viTri') }}" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Thông tin thêm</label>
                            <div class="col-sm-8">
                                <input type="text" name="thongTin" class="form-control1" id="focusedinput" value="{{ old('thongTin') }}" placeholder="...">
                            </div>
                        </div>
                        <div class="col-sm-2">   
                        </div>
                        <div class="col-sm-8"><button class="btn-success btn">Thêm</button></div>
                    </form>
                </div>
            </div>

@stop

@section('script')
<script type="text/javascript">
    if (window.FileReader) {
        function handleFileSelect(evt) {
          var files = evt.target.files;
          var f = files[0];
          var reader = new FileReader();
          
            reader.onload = (function(theFile) {
              return function(e) {
                document.getElementById('list').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="150"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', handleFileSelect, false);
</script>
@stop