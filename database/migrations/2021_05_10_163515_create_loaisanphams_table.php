<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaisanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaisanpham_ten', 200);
            $table->longText('loaisanpham_mota')->nullable();
            $table->integer('nhom_id')->unsigned();
            $table->foreign('nhom_id')->references('id')->on('nhoms')->onUpdate('cascade');
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
        Schema::dropIfExists('loaisanphams');
    }
}
