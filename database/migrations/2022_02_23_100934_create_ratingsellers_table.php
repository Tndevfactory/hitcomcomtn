<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratingsellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->foreignId('shop_id');
            $table->foreignId('user_id');
            $table->foreignId('ratingseller_id');
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
        Schema::dropIfExists('ratingsellers');
    }
}
