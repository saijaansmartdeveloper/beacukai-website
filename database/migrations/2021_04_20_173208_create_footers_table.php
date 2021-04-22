<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_instansi', 60);
            $table->text('deskripsi_instansi', 60);
            $table->string('email_instansi')->nullable();
            $table->string('web_instansi')->nullable();
            $table->string('telp_instansi')->nullable();
            $table->string('alamat_instansi')->nullable();
            $table->text('maps_instansi')->nullable();
            $table->string('jam_kerja_instansi')->nullable();
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
        Schema::dropIfExists('footers');
    }
}
