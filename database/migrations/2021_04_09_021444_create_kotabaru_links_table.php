<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKotabaruLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kotabaru_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_link', 60);
            $table->string('description_link')->nullable();
            $table->string('external_link')->nullable();
            $table->string('image_link')->nullable();
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
        Schema::dropIfExists('kotabaru_links');
    }
}
