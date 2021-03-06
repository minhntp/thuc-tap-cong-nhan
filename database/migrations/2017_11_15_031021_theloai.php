<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Theloai extends Migration
{
    public function up()
    {
        Schema::create('theloai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('tenKhongDau');
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
        Schema::dropIfExists('theloai');
    }
}
