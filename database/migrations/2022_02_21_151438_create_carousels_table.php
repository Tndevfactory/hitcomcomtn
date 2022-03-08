<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('fr_carousel_img')->nullable();
            $table->string('fr_carousel_btn')->nullable();
            $table->string('fr_carousel_link')->nullable();
            $table->string('fr_carousel_text')->nullable();
            

            $table->string('en_carousel_img')->nullable();
            $table->string('en_carousel_btn')->nullable();
            $table->string('en_carousel_link')->nullable();
            $table->string('en_carousel_text')->nullable();
            

            $table->string('ar_carousel_img')->nullable();
            $table->string('ar_carousel_btn')->nullable();
            $table->string('ar_carousel_link')->nullable();
            $table->string('ar_carousel_text')->nullable();
            

            $table->enum('active', [0, 1])->default(1);
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
        Schema::dropIfExists('carousels');
    }
}
