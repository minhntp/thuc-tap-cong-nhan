<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    Protected $table = 'khachhang';
    public function donhang() {
        return $this->hasMany('App\DonHang', 'idKhachHang', 'id');
    }
}
