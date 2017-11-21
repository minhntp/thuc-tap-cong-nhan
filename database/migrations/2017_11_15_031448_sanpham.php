<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class sanpham extends Migration
{
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTheLoai')->unsigned();
            $table->foreign('idTheLoai')->references('id')->on('theloai');
            $table->string('ten');
            $table->string('tenKhongDau');
            $table->string('hinh1');
            $table->string('hinh2');
            $table->string('hinh3');
            $table->string('hinh4');
            $table->string('kichThuoc');
            $table->tinyInteger('banChay');
            $table->tinyInteger('hangMoi');
            $table->string('thongTin');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
