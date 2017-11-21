<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XuHuong;
use App\TheLoai;
use App\SanPham;
use App\DonHang;

class DonHangController extends Controller
{
    public function getOrder() {
        $page=1;
        $donhang = DonHang::all();
        return view('admin.donhang.donhang',['donhang'=> $donhang,'page'=>$page]);
    }

    public function getWaitingOrder() {
        $page=0;
        $donhang = DonHang::all();
        return view('admin.donhang.donhang',['donhang'=> $donhang,'page'=>$page]);
    }
    public function getDeleteOrder($id) {
        $donhang = DonHang::find($id); 
        $donhang->delete();

        return redirect()->route('getOrder')->with('thongbao', ' Bạn đã xóa thành công');
    }
  
     public function getDaDuyet($id) {
        $donhang = DonHang::find($id); 
        $donhang->tinhTrang=1;
        $donhang->store();

        return redirect()->route('getOrder')->with('thongbao', ' Đã duyệt đơn hàng $id');
    }
      public function getSearchOrder(Request $r) {
        $key=$r->search;
        $page=2;
        $i=0;
        $donhang = DonHang::all(); 
        foreach($donhang as $key=>$itemDonHang){
        if(strpos($itemDonHang->id, $key) ||strpos($itemDonHang->idKhachHang, $key) ||strpos($itemDonHang->ten, $key) ||strpos($itemDonHang->soDienThoai, $key) ||strpos($itemDonHang->ngayMua, $key) ||strpos($itemDonHang->diaChi, $key) )
        $arr[$i++]=$itemDonHang->id;
    }
        $donhang=DonHang::find($arr);

       return view('admin.donhang.donhang',['donhang'=> $donhang,'page'=>$page]);
    }
}