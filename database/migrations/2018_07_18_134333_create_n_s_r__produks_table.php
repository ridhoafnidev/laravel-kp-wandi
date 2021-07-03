<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNSRProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_s_r__produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lokasi_id')->unsigned();
            $table->foreign('lokasi_id')->references('id')->on('jenis_lokasis')->onDelete('cascade');
            $table->integer('ukuran');
            $table->string('jangka_waktu');
            $table->integer('ketinggian');
            $table->integer('nsr');
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
        Schema::dropIfExists('n_s_r__produks');
    }
}
