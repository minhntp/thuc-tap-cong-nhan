<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\SanPham;

class SanPhamController extends Controller
{
    public function getSanPham() {
        $sanpham = SanPham::all();
        return view('admin.sanpham.sanpham')->with('sanpham', $sanpham);
    }

    public function getThemSanPham() {
        $theloai = TheLoai::all();
        return view('admin.sanpham.them-sanpham')->with('theloai', $theloai);
    }

    public function postThemSanPham(Request $request) {
         //dd($request);
        $this->validate($request,
        [
            'theLoai' => 'required',
            'tenSanPham' => 'required|unique:SanPham,ten|min:2|max:80',
            'gia' => 'numeric|min:0',
            'hinh1' => 'required|image',
            'hinh2' => 'image',
            'hinh3' => 'image',
            'hinh4' => 'image',
            'kichThuoc' => 'required|min:1|max:20',
            'thongTin' => 'required|min:10|max:2000',
            'hangMoi' => 'required',
            'banChay' => 'required',            
        ],
        [
            'theLoai.required' => 'Bạn chưa chọn thể loại',
            'tenSanPham.unique' => 'Tên sản phẩm đã tồn tại',
            'tenSanPham.required' =>'Bạn chưa nhập tên sản phẩm',
            'tenSanPham.min'=>'Tên sản phẩm phải có độ dài từ 2-80 ký tự',
            'tenSanPham.max'=>'Tên sản phẩm phải có độ dài từ 2-80 ký tự',
            'gia.numeric' => 'Giá tiền phải là chữ số',
            'gia.min' => 'Giá tền thấp nhất là 0',
            'hinh1.required' => 'Bạn phải chọn hình 1',
            'hinh1.image' => 'Hình 1 không đúng định dạng',
            'hinh2.image' => 'Hình 2 không đúng định dạng',
            'hinh3.image' => 'Hình 3 không đúng định dạng',
            'hinh4.image' => 'Hình 4 không đúng định dạng',
            'kichThuoc.required' => 'Bạn chưa nhập kích thước',
            'kichThuoc.min' => 'Kích thước có độ dài từ 1-20 ký tự',
            'kichThuoc.max' => 'Kích thước có độ dài từ 1-20 ký tự',
            'thongTin.required' => 'Bạn phải nhập thông tin sản phẩm',
            'thongTin.min' => 'Thông tin sản phẩm có độ dài từ 10-2000 kí tự',
            'thongTin.max' => 'Thông tin sản phẩm có độ dài từ 10-2000 kí tự',
            'hangMoi.required' => 'Bạn phải lựa chọn "Hàng mới"',
            'banChay.required' => 'Bạn phải lựa chọn "Bán chạy"',
        ]);

        $sanpham = new SanPham;
        $sanpham->idTheLoai = $request->theLoai;
        $sanpham->ten = $request->tenSanPham;
        $sanpham->gia = $request->gia;
        $sanpham->tenKhongDau = changeTitle($request->tenKhongDau);
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/SanPham
        // và return về random tên
        
        if(!empty($request->hinh1)){
            $tenHinh1 = $request->hinh1->store('SanPham');
            $sanpham->hinh1 = $tenHinh1;
        }
        if(!empty($request->hinh2)){
            $tenHinh2 = $request->hinh2->store('SanPham');
            $sanpham->hinh2 = $tenHinh2;
        }
        if(!empty($request->hinh3)){
            $tenHinh3 = $request->hinh3->store('SanPham');
            $sanpham->hinh3 = $tenHinh3;
        }
        if(!empty($request->hinh4)){
            $tenHinh4 = $request->hinh4->store('SanPham');
            $sanpham->hinh4 = $tenHinh4;
        }
        $sanpham->kichThuoc = $request->kichThuoc;
        $sanpham->banChay = $request->banChay;
        $sanpham->hangMoi = $request->hangMoi;
        $sanpham->thongTin = $request->thongTin;
        $sanpham->save();

        return redirect()->route('getThemSanPham')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getSuaSanPham($id) {
        $sanpham = SanPham::find($id);
        $theloai = TheLoai::all();
        return view('admin.sanpham.sua-sanpham')->with('sanpham', $sanpham)->with('theloai', $theloai);
    }

    public function postSuaSanPham(Request $request, $id) {
        $sanpham = SanPham::find($id);
        $this->validate($request,
        [
            'theLoai' => 'required',
            'tenSanPham' => 'required|unique:SanPham,ten|min:2|max:80',
            'gia' => 'numeric|min:0',
            'hinh1' => 'required|image',
            'hinh2' => 'image',
            'hinh3' => 'image',
            'hinh4' => 'image',
            'kichThuoc' => 'required|min:1|max:20',
            'thongTin' => 'required|min:10|max:2000',
            'hangMoi' => 'required',
            'banChay' => 'required',            
        ],
        [
            'theLoai.required' => 'Bạn chưa chọn thể loại',
            'tenSanPham.unique' => 'Tên sản phẩm đã tồn tại',
            'tenSanPham.required' =>'Bạn chưa nhập tên sản phẩm',
            'tenSanPham.min'=>'Tên sản phẩm phải có độ dài từ 2-80 ký tự',
            'tenSanPham.max'=>'Tên sản phẩm phải có độ dài từ 2-80 ký tự',
            'gia.numeric' => 'Giá tiền phải là chữ số',
            'gia.min' => 'Giá tền thấp nhất là 0',
            'hinh1.required' => 'Bạn phải chọn hình 1',
            'hinh1.image' => 'Hình 1 không đúng định dạng',
            'hinh2.image' => 'Hình 2 không đúng định dạng',
            'hinh3.image' => 'Hình 3 không đúng định dạng',
            'hinh4.image' => 'Hình 4 không đúng định dạng',
            'kichThuoc.required' => 'Bạn chưa nhập kích thước',
            'kichThuoc.min' => 'Kích thước có độ dài từ 1-20 ký tự',
            'kichThuoc.max' => 'Kích thước có độ dài từ 1-20 ký tự',
            'thongTin.required' => 'Bạn phải nhập thông tin sản phẩm',
            'thongTin.min' => 'Thông tin sản phẩm có độ dài từ 10-2000 kí tự',
            'thongTin.max' => 'Thông tin sản phẩm có độ dài từ 10-2000 kí tự',
            'hangMoi.required' => 'Bạn phải lựa chọn "Hàng mới"',
            'banChay.required' => 'Bạn phải lựa chọn "Bán chạy"',
        ]);

        $sanpham->idTheLoai = $request->theLoai;
        $sanpham->ten = $request->tenSanPham;
        $sanpham->gia = $request->gia;
        $sanpham->tenKhongDau = changeTitle($request->tenKhongDau);
        // Xoa file anh cu
        if(!empty($theloai->hinh1)) {
            $path = public_path() . '/upload/' . $sanpham->hinh1;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh2)) {
            $path = public_path() . '/upload/' . $sanpham->hinh2;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh3)) {
            $path = public_path() . '/upload/' . $sanpham->hinh3;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh4)) {
            $path = public_path() . '/upload/' . $sanpham->hinh4;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
            
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/SanPham
        // và return về random tên.
        if(!empty($request->hinh1)){
            $tenHinh1 = $request->hinh1->store('SanPham');
            $sanpham->hinh1 = $tenHinh1;
        }
        if(!empty($request->hinh2)){
            $tenHinh2 = $request->hinh2->store('SanPham');
            $sanpham->hinh2 = $tenHinh2;
        }
        if(!empty($request->hinh3)){
            $tenHinh3 = $request->hinh3->store('SanPham');
            $sanpham->hinh3 = $tenHinh3;
        }
        if(!empty($request->hinh4)){
            $tenHinh4 = $request->hinh4->store('SanPham');
            $sanpham->hinh4 = $tenHinh4;
        }
        $sanpham->kichThuoc = $request->kichThuoc;
        $sanpham->banChay = $request->banChay;
        $sanpham->hangMoi = $request->hangMoi;
        $sanpham->thongTin = $request->thongTin;
        $sanpham->save();

        return redirect()->route('getSuaSanPham', ['id'=>$id])->with('thongbao','Sửa sản phẩm thành công')->withInput(Input::all());
    }

    public function getXoaSanPham($id) {
        $sanpham = SanPham::find($id);               
        // Xoa file anh cu
        if(!empty($theloai->hinh1)) {
            $path = public_path() . '/upload/' . $sanpham->hinh1;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh2)) {
            $path = public_path() . '/upload/' . $sanpham->hinh2;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh3)) {
            $path = public_path() . '/upload/' . $sanpham->hinh3;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        // Xoa file anh cu
        if(!empty($theloai->hinh4)) {
            $path = public_path() . '/upload/' . $sanpham->hinh4;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        $sanpham->delete();

        return redirect()->route('getSanPham')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
}
