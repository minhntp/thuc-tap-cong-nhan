<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class thanhphandonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhphandonhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDonHang')->unsigned();
            $table->foreign('idDonHang')->references('id')->on('donhang');
            $table->integer('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('sanpham');
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
        Schema::dropIfExists('thanhphandonhang');
    }
}
