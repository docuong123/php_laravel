<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onUpdate('cascade');
            $table->integer('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onUpdate('cascade');
            $table->integer('chitietdonhang_soluong');
            $table->decimal('gia_sp',10,2);
            $table->decimal('chitietdonhang_thanhtien',10,2);
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
        Schema::dropIfExists('chitietdonhangs');
    }
}
