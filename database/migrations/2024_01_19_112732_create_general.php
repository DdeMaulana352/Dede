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
        Schema::create('general', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('moto1');
            $table->string('moto2');
            $table->string('tentang');
            $table->string('alamat');
            $table->string('maps');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('google_plus');
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
        Schema::dropIfExists('general');
    }
};
