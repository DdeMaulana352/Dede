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
        Schema::create('riwayat_cs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pel');
            $table->string('pakaian');
            $table->string('order_layanan');
            $table->string('durasi_kerja');
            $table->string('qty_perpcs');
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar');
            $table->string('harga_perpcs');
            $table->string('total_harga');
            $table->string('bayar');
            $table->string('kembalian');
            $table->string('status');
            $table->string('ket');
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
        Schema::dropIfExists('riwayat_cs');
    }
};
