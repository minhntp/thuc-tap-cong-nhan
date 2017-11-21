<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhPhanDonHang extends Model
{
    Protected $table = 'thanhphandonhang';
    
    public function sanpham() {
        return $this->belongsTo('App\SanPham', 'idSanPham', 'id');
    }

}
