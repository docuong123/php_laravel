<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLohangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lohangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lohang_kyhieu',200);
            $table->integer('lohang_hansudung');
            $table->decimal('lohang_giamuavao',10,2);
            $table->decimal('lohang_giabanra',10,2);
            $table->integer('lohang_soluongsp');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onUpdate('cascade');
            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcaps')->onUpdate('cascade');
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
        Schema::dropIfExists('lohangs');
    }
}
