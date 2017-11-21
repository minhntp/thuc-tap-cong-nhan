@extends('admin.layout.index') 
@section('content')

            <div class="col-md-12 graphs">
            <a href="{{ route('getSlide') }}"><button class="btn-info btn">Trở lại</button></a>
                <div class="xs">
                    <h3>Sửa Slide</h3>

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

                    <form action="{{ route('postSuaSlide', ['id'=>$slide->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleInputFile">Hình</label>
                            <div class="col-sm-8">
                                <input type="file" id="file" name="hinh">
                                <output id="list"><img src="{{ url('/upload/') }}/{{ $slide->hinh }}" title="" width="300"></output>
                                <p class="help-block">Hình ảnh phải có định dạng jpeg, png, bmp, gif, hoặc svg</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Mô tả ngắn</label>
                            <div class="col-sm-8">
                                <input type="text" name="moTaNgan" class="form-control1" id="focusedinput" value="{{ $slide->moTaNgan }}" placeholder="AirMax...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Mô tả dài</label>
                            <div class="col-sm-8">
                                <input type="text" name="moTaDai" class="form-control1" id="focusedinput" value="{{ $slide->moTaDai }}" placeholder="My Life...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Link</label>
                            <div class="col-sm-8">
                                <input type="text" name="link" class="form-control1" id="focusedinput" value="{{ $slide->link }}" placeholder="URL here">
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

<!-- /#page-wrapper -->
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
                document.getElementById('list').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="300"/>'].join('');
              };
            })(f);
      
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', handleFileSelect, false);
</script>
@stop