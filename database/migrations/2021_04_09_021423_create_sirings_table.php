<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_siring', 60);
            $table->string('description_siring')->nullable();
            $table->string('link_siring')->nullable();
            $table->string('icon_siring')->nullable();
            $table->integer('is_priority')->nullable();
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
        Schema::dropIfExists('sirings');
    }
}
