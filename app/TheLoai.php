<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    Protected $table = 'theloai';
    
    public function sanpham() {
        return $this->hasMany('App\SanPham', 'idTheLoai', 'id');
    }

}
