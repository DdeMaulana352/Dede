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
        Schema::create('paketcs', function (Blueprint $table) {
            $table->id();
            $table->string('pakaian');
            $table->string('paket_layanan');
            $table->string('qty_perpcs');
            $table->string('durasi_kerja');
            $table->string('harga_reguler');
            $table->string('harga_kilat');
            $table->string('harga_express');
            $table->string('total_harga');
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
        Schema::dropIfExists('paketcs');
    }
};
