<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status');
            $table->integer('denda')->nullable(); 
            $table->integer('lamapeminjaman');
            $table->date('tgl_pengembalian');
            $table->BigInteger('riwayat_id')->unsigned();
            $table->BigInteger('kode_buku_id')->unsigned();
            $table->timestamps();
 
            $table->foreign('riwayat_id')->references('id')->on('riwayats') ->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('kode_buku_id')->references('id')->on('kode_bukus') ->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_details');
    }
}
