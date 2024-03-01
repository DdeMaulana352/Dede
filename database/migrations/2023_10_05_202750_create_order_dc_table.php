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
        Schema::create('order_dc', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pel');
            $table->string('order_layanan');
            $table->string('durasi_kerja');
            $table->string('qty_perkg');
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar');
            $table->string('total_harga');
            $table->string('status');
            $table->string('ket');
            $table->string('alamat');
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
        Schema::dropIfExists('order_dc');
    }
};
