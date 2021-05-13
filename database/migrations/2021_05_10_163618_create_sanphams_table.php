<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sanpham_ten');
            $table->string('sanpham_anh');
            $table->longtext('sanpham_mota')->nullable();
            $table->integer('sanpham_khuyenmai');
            $table->integer('loaisanpham_id')->unsigned();
            $table->foreign('loaisanpham_id')->references('id')->on('loaisanphams')->onUpdate('cascade');
            $table->integer('donvitinh_id')->unsigned();
            $table->foreign('donvitinh_id')->references('id')->on('donvitinhs')->onUpdate('cascade');
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
        Schema::dropIfExists('sanphams');
    }
}
