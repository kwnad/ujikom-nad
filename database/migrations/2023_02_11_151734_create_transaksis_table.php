<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('no_tlp');
            $table->text('alamat');
            $table->unsignedBigInteger('produk_id');
            $table->integer('total_harga');
            $table->unsignedBigInteger('metodepembayaran_id');
            $table->foreign('metodepembayaran_id')->references('id')->on('metode_pembayarans')->onDelete('cascade');
            $table->date('tanggal_pemesanan');
            $table->enum('status', ['proses', 'sukses'])->default('proses');
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
        Schema::dropIfExists('transaksis');
    }
}
