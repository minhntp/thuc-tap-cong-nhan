@extends('admin.layout.index') 

@section('content')

    <div class="col-md-12 graphs">
        <a href="{{ route('getSanPham') }}"><button class="btn-info btn">Trở lại</button></a>
        <div class="xs">
            <h3>Thêm mới sản phẩm</h3>
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
            <form action="{{ route('postThemSanPham') }}" method="post" class="form-horizontal " enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Thể loại</label>
                    <div class="col-sm-8">
                        <select name="theLoai" id="selector1" class="form-control1">
                            @foreach($theloai as $key=>$itemTheLoai)
                            <option value="{{$itemTheLoai->id}}">{{ $itemTheLoai->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" name="tenSanPham" class="form-control1" id="focusedinput" value="{{ old('tenSanPham') }}" placeholder="VD: Adidas...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">Giá tiền ($)</label>
                    <div class="col-sm-8">
                    <input type="text" name="gia" class="form-control1"  value="{{ old('gia') }}"  placeholder="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="exampleInputFile">Hình 1</label>
                    <div class="col-sm-8">
                        <input type="file" id="file1" name="hinh1">
                        <output id="list1"></output>
                        <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="exampleInputFile">Hình 2</label>
                    <div class="col-sm-8">
                        <input type="file" id="file2" name="hinh2">
                        <output id="list2"></output>
                        <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="exampleInputFile">Hình 3</label>
                    <div class="col-sm-8">
                        <input type="file" id="file3" name="hinh3">
                        <output id="list3"></output>
                        <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="exampleInputFile">Hình 4</label>
                    <div class="col-sm-8">
                        <input type="file" id="file4" name="hinh4">
                        <output id="list4"></output>
                        <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="checkbox" class="col-sm-2 control-label">Kích thước cho phép</label>
                    <div class="col-sm-8">
                        <input type="text" name="kichThuoc" value="{{ old('kichThuoc') }}"  class="form-control1" placeholder="VD: 35-44...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">Cấp độ bán chạy</label>
                    <div class="col-sm-8">
                    <input type="text" name="banChay" class="form-control1" value="{{ old('banChay') }}" placeholder="Bắt đầu từ 0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="radio" class="col-sm-2 control-label">Hàng mới</label>
                    <div class="col-sm-8">
                        <div class="radio-inline">
                            <label>
                                <input name="hangMoi" type="radio" value="1" checked="">Có</label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input name="hangMoi" type="radio" value="0">Không</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Thông tin sản phẩm</label>
                    <div class="col-sm-8">
                        <textarea name="thongTin" id="txtarea1" cols="50" rows="8" class="form-control1" style="height: initial">{{ old('thongTin') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <button class="btn-success btn">Thêm</button>
                </div>
                <div class="clear-fix"></div>
            </form>
        </div>
    </div>

@stop

@section('script')
<script type="text/javascript">
    if (window.FileReader) {
        function handleFileSelect1(evt) {
          var files = evt.target.files;
          var f = files[0];
          var reader = new FileReader();
          
            reader.onload = (function(theFile) {
              return function(e) {
                document.getElementById('list1').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="100"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
        function handleFileSelect2(evt) {
          var files = evt.target.files;
          var f = files[0];
          var reader = new FileReader();
          
            reader.onload = (function(theFile) {
              return function(e) {
                document.getElementById('list2').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="100"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
        function handleFileSelect3(evt) {
          var files = evt.target.files;
          var f = files[0];
          var reader = new FileReader();
          
            reader.onload = (function(theFile) {
              return function(e) {
                document.getElementById('list3').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="100"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
        function handleFileSelect4(evt) {
          var files = evt.target.files;
          var f = files[0];
          var reader = new FileReader();
          
            reader.onload = (function(theFile) {
              return function(e) {
                document.getElementById('list4').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="100"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
       } else {
        alert('This browser does not support FileReader');
      }
      
    document.getElementById('file1').addEventListener('change', handleFileSelect1, false);
    document.getElementById('file2').addEventListener('change', handleFileSelect2, false);
    document.getElementById('file3').addEventListener('change', handleFileSelect3, false);
    document.getElementById('file4').addEventListener('change', handleFileSelect4, false);
</script>

@stop