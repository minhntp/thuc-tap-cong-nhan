<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    Protected $table = 'sanpham';
    public function theloai()
    {   
        return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');
    }
}
