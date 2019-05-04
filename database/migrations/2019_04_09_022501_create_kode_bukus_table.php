<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKodeBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kode_bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodebuku'); 
            $table->BigInteger('buku_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('bukus') ->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode_bukus');
    }
}
