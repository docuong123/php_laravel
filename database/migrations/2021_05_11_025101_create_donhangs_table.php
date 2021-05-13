<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khachhang_id')->unsigned();
            $table->foreign('khachhang_id')->references('id')->on('khachhangs')->onUpdate('cascade');
            $table->integer('tinhtranghd_id')->unsigned();
            $table->foreign('tinhtranghd_id')->references('id')->on('tinhtranghds')->onUpdate('cascade');
            $table->integer('thongtinnhanhang_id')->unsigned();
            $table->foreign('thongtinnhanhang_id')->references('id')->on('thongtinnhanhangs')->onUpdate('cascade');
            $table->decimal('donhang_tongtien',10,2);
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
        Schema::dropIfExists('donhangs');
    }
}
