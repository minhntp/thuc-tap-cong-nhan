<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XuHuong;
use App\TheLoai;
use App\SanPham;

class XuHuongController extends Controller
{
    public function getBanChay() {
        $sanpham = SanPham::all();
        return view('admin.xuhuong.banchay')->with('sanpham', $sanpham);
    }

    public function getHangMoi() {
        $sanpham = SanPham::all();
        return view('admin.xuhuong.hangmoi')->with('sanpham', $sanpham);
    }

    public function getSuaXuHuong() {
        $xuhuong = XuHuong::all();
        return view('admin.xuhuong.sua-xuhuong')->with('xuhuong', $xuhuong);
    }

    public function postSuaXuHuong(Request $request) {
        $this->validate($request, 
        [
            'moTaHangMoi' => 'max: 50',
            'moTaBanChay' => 'max: 50',
        ],
        [
            'moTaHangMoi.max' => 'Mô tả hàng mới tối đa 50 kí tự',
            'moTaBanChay.max' => 'Mô tả hàng bán chạy tối đa 50 kí tự',
        ]);
        if(is_empty(XuHuong::find(1))) {
            $xuhuong = new XuHuong;
        } else {
            $xuhuong = XuHuong::find(1);
        }
        $xuhuong->moTaHangMoi = $request->moTaHangMoi;
        $xuhuong->moTaBanChay = $request->moTaBanChay;
        $xuhuong->save();
        
        return redirect()->route('getSuaXuHuong')->with('thongbao', 'Cập nhật thành công xu hướng');
    }
    
}
