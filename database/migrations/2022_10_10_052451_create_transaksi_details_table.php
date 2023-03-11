<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id_transaksi')->on('transaksi');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->integer('qty')->comment('jumlah kuantitas produk yang di beli');
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
        Schema::dropIfExists('transaksi_detail');
    }
};
