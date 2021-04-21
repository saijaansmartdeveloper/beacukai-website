<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mata_uang', 60);
            $table->string('nilai')->nullable();
            $table->string('perubahan')->nullable();
            $table->string('status')->nullable();
            $table->string('tanggal_berlaku')->nullable();
            $table->foreignId('creator_id')->constrained('users')->onDelete('restrict');
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
        Schema::dropIfExists('kurs');
    }
}
