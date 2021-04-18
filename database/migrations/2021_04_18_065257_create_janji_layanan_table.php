<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJanjiLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('janji_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_janji_layanan');
            $table->string('jenis_janji_layanan')->nullable();
            $table->string('waktu_janji_layanan')->nullable();
            $table->string('estimasi_janji_layanan')->nullable();
            $table->string('biaya_janji_layanan')->nullable();
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
        Schema::dropIfExists('janji_layanan');
    }
}
