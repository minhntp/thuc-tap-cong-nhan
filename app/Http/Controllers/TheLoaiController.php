<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getTheLoai() {
        $theloai = TheLoai::all();
        return view('admin.theloai.theloai')->with('theloai', $theloai);
    }

    public function getThemTheLoai() {
        return view('admin.theloai.them-theloai');
    }

    public function postThemTheLoai(Request $request) {
        $this->validate($request,
        [
            'ten' => 'required|unique:TheLoai,ten|min:2|max:50',
            'hinh' => 'image'
        ],
        [
            'ten.unique' => 'Tên thể loại đã tồn tại',
            'ten.required' =>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên thể loại phải có độ dài từ 2-50 ký tự',
            'ten.max'=>'Tên thể loại phải có độ dài từ 2-50 ký tự',
            'hinh.image' => 'Hình không đúng định dạng',
        ]);

        $theloai = new TheLoai;
        $theloai->ten = $request->ten;
        $theloai->tenKhongDau = changeTitle($request->ten);
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/SanPham
        // và return về random tên.
        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('TheLoai');
            $theloai->hinh = $tenHinh;
        }
        $theloai->save();

        return redirect()->route('getThemTheLoai')->with('thongbao','Thêm thể loại thành công');
    }

    public function getSuaTheLoai($id) {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua-theloai')->with('theloai', $theloai);
    }

    public function postSuaTheLoai(Request $request, $id) {
        $theloai = TheLoai::find($id);
        $this->validate($request,
        [
            'ten' => 'required|unique:TheLoai,ten|min:2|max:50'
        ],
        [
            'ten.unique' => 'Tên thể loại đã tồn tại',
            'ten.required' =>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên thể loại phải có độ dài từ 2-50 ký tự',
            'ten.max'=>'Tên thể loại phải có độ dài từ 2-50 ký tự',
        ]);
        
        $theloai->ten = $request->ten;
        $theloai->tenKhongDau = changeTitle($request->ten);
        // Nếu có upload hình
        if(!empty($theloai->hinh)) {
            $path = public_path() . '/upload/' . $theloai->hinh;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }

        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('TheLoai');
            $theloai->hinh = $tenHinh;
        }

        $theloai->save();

        return redirect()->route('getSuaTheLoai', ['id'=>$id])->with('thongbao','Sửa thể loại thành công');
    }

    public function getXoaTheLoai($id) {
        $theloai = TheLoai::find($id);
        // Nếu có upload hình
        if(!empty($theloai->hinh)) {
            $path = public_path() . '/upload/' . $theloai->hinh;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        
        $theloai->delete();

        return redirect()->route('getTheLoai')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
}
