<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhacungcapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcaps', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nhacungcap_ten', 200);
            $table->string('nhacungcap_diachi', 200);
            $table->string('nhacungcap_sdt', 12);
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
        Schema::dropIfExists('nhacungcaps');
    }
}
