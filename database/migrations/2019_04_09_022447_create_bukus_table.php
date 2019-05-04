<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul'); 
            $table->BigInteger('penulis_id')->unsigned(); 
            $table->integer('kategori_id')->unsigned(); 
            $table->integer('tahun_terbit'); 
            $table->integer('stok'); 
            $table->string('sinopsis'); 
            $table->timestamps();

            $table->foreign('penulis_id')->references('id')->on('penulis') ->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('kategori_id')->references('id')->on('categories') ->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
