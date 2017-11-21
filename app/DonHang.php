<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    Protected $table = 'donhang';

    public function khachhang() {
        return $this->belongsTo('App\KhachHang', 'idKhachHang', 'id');
    }

    public function thanhphandonhang() {
        return $this->hasMany('App\ThanhPhanDonHang', 'idDonHang', 'id');
    }
}
