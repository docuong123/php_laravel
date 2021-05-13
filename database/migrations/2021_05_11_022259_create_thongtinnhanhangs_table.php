<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongtinnhanhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinnhanhangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nguoinhan_ten');
            $table->string('nguoinhan_diachi');
            $table->string('nguoinhan_sodienthoai');
            $table->string('nguoinhan_email');
            $table->longtext('nguoinhan_ghichu');
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
        Schema::dropIfExists('thongtinnhanhangs');
    }
}
