<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('email');
            $table->string('password');            
            $table->string('hinh')->nullable();
            $table->date('ngaySinh');          
            $table->string('diaChi');
            $table->string('soDienThoai');
            $table->string('viTri');
            $table->text('thongTin')->nullable();
            $table->timestamp('ngayGiaNhap');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
