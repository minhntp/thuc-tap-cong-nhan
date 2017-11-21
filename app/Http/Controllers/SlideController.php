<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getSlide() {
        $slide = Slide::all();
        return view('admin.slide.slide')->with('slide', $slide);
    }

    public function getThemSlide() {
        return view('admin.slide.them-slide');
    }

    public function postThemSlide(Request $request) {
        $this->validate($request,
        [
            'hinh' => 'required|image',
            'moTaNgan' => 'min:2|max:6',
            'moTaDai' => 'min:6|max:20',
        ],
        [
            'hinh.required' =>'Bạn chưa chọn hình',
            'hinh.image' => 'Hình không đúng định dạng',
            'moTaNgan.min'=>'Mô tả ngắn phải có độ dài từ 2-6 ký tự',
            'moTaNgan.max'=>'Mô tả ngắn i phải có độ dài từ 2-6 ký tự',
            'moTaDai.min'=>'Mô tả dài  phải có độ dài từ 6-20 ký tự',
            'moTaDai.max'=>'Mô tả dài phải có độ dài từ 6-20 ký tự',
        ]);

        $slide = new Slide;
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/SanPham
        // và return về random tên.
        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('Slide');
            $slide->hinh = $tenHinh;
        }
        $slide->moTaNgan = $request->moTaNgan;
        $slide->moTaDai = $request->moTaDai;
        $slide->link = $request->link;
        $slide->save();

        return redirect()->route('getThemSlide')->with('thongbao','Thêm Slide thành công');
    }

    public function getSuaSlide($id) {
        $slide = Slide::find($id);
        return view('admin.slide.sua-slide')->with('slide', $slide);
    }

    public function postSuaSlide(Request $request, $id) {
        $slide = slide::find($id);
        $this->validate($request,
        [
            'hinh' => 'required|image',
            'moTaNgan' => 'min:2|max:6',
            'moTaDai' => 'min:6|max:20',
        ],
        [
            'hinh.required' =>'Bạn chưa chọn hình',
            'hinh.image' => 'Hình không đúng định dạng',
            'moTaNgan.min'=>'Tên thể loại phải có độ dài từ 2-6 ký tự',
            'moTaNgan.max'=>'Tên thể loại phải có độ dài từ 2-6 ký tự',
            'moTaDai.min'=>'Tên thể loại phải có độ dài từ 6-20 ký tự',
            'moTaDai.max'=>'Tên thể loại phải có độ dài từ 6-20 ký tự',
        ]);
        
        // Nếu có upload hình
        if(!empty($slide->hinh)) {
            $path = public_path() . '/upload/' . $slide->hinh;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
       // Thay the
        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('Slide');
            $slide->hinh = $tenHinh;
        }
        $slide->moTaNgan = $request->moTaNgan;
        $slide->moTaDai = $request->moTaDai;
        $slide->link = $request->link;
        $slide->save();

        return redirect()->route('getSuaSlide', ['id'=>$id])->with('thongbao','Sửa Slide thành công');
    }

    public function getXoaSlide($id) {
        $slide = Slide::find($id);
        // Nếu có upload hình
        if(!empty($slide->hinh)) {
            $path = public_path() . '/upload/' . $slide->hinh;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
       $slide->delete();

        return redirect()->route('getSlide')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
}
