<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class donhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idKhachHang')->unsigned()->nullable();
            $table->foreign('idKhachHang')->references('id')->on('khachhang');
            $table->string('giaTien');
            $table->tinyInteger('tinhTrang');
            $table->string('ten');          
            $table->string('diaChi');
            $table->string('soDienThoai');
            $table->text('thongTin')->nullable();
            $table->timestamp('ngayMua');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
