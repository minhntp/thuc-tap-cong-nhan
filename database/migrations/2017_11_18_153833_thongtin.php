<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class thongtin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtin', function (Blueprint $table) {
            $table->string('facebook')->nullable();
            $table->string('googleplus')->nullable();         
            $table->string('twitter')->nullable();
            $table->string('soDienThoai')->nullable();
            $table->string('diaChi')->nullable();
            $table->string('thongTin')->nullable();
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
