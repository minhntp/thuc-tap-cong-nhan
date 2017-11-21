<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function getAdmin() {
        $admin = Admin::all();
        return view('admin.admin.admin')->with('admin', $admin);
    }

    public function getThemAdmin() {
        return view('admin.admin.them-admin');
    }

    public function postThemAdmin(Request $request) {
        $this->validate($request,
        [
            'ten' => 'required|min:2|max:50',
            'hinh' => 'image',
            'email' => 'required|email|unique:Admin,email|min:2|max:50',
            'password' => 'required|min:4|max:30',
            'passwordAgain' => 'required|same:password',
            'ngaySinh' => 'required|date',
            'diaChi' => 'required|min:5|max:100',
            'soDienThoai' => 'required|min:5|max:20',
            'level' => 'required',
            'viTri' => 'required|min:1|max:100',
        ],
        [
            'ten.required' =>'Bạn phải nhập tên',
            'ten.min'=>'Tên phải có độ dài từ 2-50 ký tự',
            'ten.max'=>'Tên phải có độ dài từ 2-50 ký tự',
            'hinh.image' => 'Hình không đúng định dạng',
            'email.required' => 'Bạn phải nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.min' => 'Email phải có độ dài từ 2-50 ký tự',
            'email.max' => 'Email phải có độ dài từ 2-50 ký tự',
            'password.required' => 'Bạn phải nhập password',
            'password.min' => 'Password phải có độ dài từ 4-30 ký tự',
            'password.max' => 'Password phải có độ dài từ 4-30 ký tự',
            'passwordAgain.required' => 'Bạn phải nhập lại password',
            'passwordAgain.same' => 'Password chưa khớp',
            'ngaySinh.required' => 'Bạn phải nhập ngày sinh',
            'ngaySinh.date' => 'Ngày sinh không đúng định dạng',
            'diaChi.required' => 'Bạn phải nhập địa chỉ',
            'diaChi.min' => 'Địa chỉ có độ dài từ 5-100 ký tự',
            'diaChi.max' => 'Địa chỉ có độ dài từ 5-100 ký tự',
            'soDienThoai.required' => 'Bạn phải nhập số điện thoại',
            'soDienThoai.min' => 'Số điện thoại có độ dài từ 5-20 chữ số',
            'soDienThoai.max' => 'Số điện thoại có độ dài từ 5-20 chữ số',
            'level.required' => 'Bạn phải chọn cấp độ',
            'viTri.required' => 'Bạn phải nhập tên vị trí',
            'viTri.min' => 'Vị trí có độ dài từ 1-100 ký tự',
            'viTri.max' => 'Vị trí có độ dài từ 1-100 ký tự',
        ]);

        $admin = new Admin;
        $admin->ten = $request->ten;
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/Admin
        // và return về random tên.
        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('Admin');
            $admin->hinh = $tenHinh;
        }
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->ngaySinh = $request->ngaySinh;
        $admin->diaChi = $request->diaChi;
        $admin->soDienThoai = $request->soDienThoai;
        $admin->level = $request->level;
        $admin->viTri = $request->viTri;
        $admin->thongTin = $request->thongTin;
        
        $admin->save();

        return redirect()->route('getThemAdmin')->with('thongbao','Thêm admin thành công');
    }

    public function getSuaAdmin($id) {
        $admin = admin::find($id);
        return view('admin.admin.sua-admin')->with('admin', $admin);
    }

    public function postSuaAdmin(Request $request, $id) {
        $this->validate($request,
        [
            'ten' => 'required|min:2|max:50',
            'hinh' => 'image',
            'ngaySinh' => 'required|date',
            'diaChi' => 'required|min:5|max:100',
            'soDienThoai' => 'required|min:5|max:20',
            'level' => 'required',
            'viTri' => 'required|min:1|max:100',
        ],
        [
            'ten.required' =>'Bạn phải nhập tên',
            'ten.min'=>'Tên phải có độ dài từ 2-50 ký tự',
            'ten.max'=>'Tên phải có độ dài từ 2-50 ký tự',
            'hinh.image' => 'Hình không đúng định dạng',
            'password.required' => 'Bạn phải nhập password',
            'password.min' => 'Password phải có độ dài từ 4-30 ký tự',
            'password.max' => 'Password phải có độ dài từ 4-30 ký tự',
            'ngaySinh.required' => 'Bạn phải nhập ngày sinh',
            'ngaySinh.date' => 'Ngày sinh không đúng định dạng',
            'diaChi.required' => 'Bạn phải nhập địa chỉ',
            'diaChi.min' => 'Địa chỉ có độ dài từ 5-100 ký tự',
            'diaChi.max' => 'Địa chỉ có độ dài từ 5-100 ký tự',
            'soDienThoai.required' => 'Bạn phải nhập số điện thoại',
            'soDienThoai.min' => 'Số điện thoại có độ dài từ 5-20 chữ số',
            'soDienThoai.max' => 'Số điện thoại có độ dài từ 5-20 chữ số',
            'level.required' => 'Bạn phải chọn cấp độ',
            'viTri.required' => 'Bạn phải nhập tên vị trí',
            'viTri.min' => 'Vị trí có độ dài từ 1-100 ký tự',
            'viTri.max' => 'Vị trí có độ dài từ 1-100 ký tự',
        ]);
        $admin = Admin::find($id);
        $admin->ten = $request->ten;
        // Hàm store sẽ lưu hình ở public/upload ( cấu hình trong config/filesystem)
        // Tham số trong method store là tên thư mục cần để ảnh vô
        // tức là để ở public/upload/Admin
        // và return về random tên.
        if(!empty($request->hinh)){
            $tenHinh = $request->hinh->store('Admin');
            $admin->hinh = $tenHinh;
        }
        $admin->email = $request->email;
       
        $admin->ngaySinh = $request->ngaySinh;
        $admin->diaChi = $request->diaChi;
        $admin->soDienThoai = $request->soDienThoai;
        $admin->level = $request->level;
        $admin->viTri = $request->viTri;
        $admin->thongTin = $request->thongTin;

        if($request->changePassword == "on")
        {
            $this->validate($request,
            [
    
                'password' => 'required|min:4|max:30',
                'passwordAgain' => 'required|same:password',
            ],
            [
                
                'password.required' => 'Bạn phải nhập password',
                'password.min' => 'Password phải có độ dài từ 4-30 ký tự',
                'password.max' => 'Password phải có độ dài từ 4-30 ký tự',
                'passwordAgain.required' => 'Bạn phải nhập lại password',
                'passwordAgain.same' => 'Password chưa khớp',
                
            ]);
            $admin->password = bcrypt($request->password);
        }
        
        $admin->save();

        return redirect()->route('getSuaAdmin', ['id'=>$id])->with('thongbao','Sửa admin thành công');
    }

    public function getXoaAdmin($id) {
        $admin = Admin::find($id);
        // Nếu có upload hình
        if(!empty($admin->hinh)) {
            $path = public_path() . '/upload/' . $admin->hinh;
            // xem thử hình có tồn tại hay không
            if(file_exists($path)) {
                //delete image
                unlink($path);
            }
        }
        
        $admin->delete();

        return redirect()->route('getAdmin')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
}
