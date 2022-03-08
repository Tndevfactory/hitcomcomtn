<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string('en_banner_img')->nullable();
            $table->string('en_banner_btn')->nullable();
            $table->string('en_banner_link')->nullable();
            $table->string('en_banner_text')->nullable();

            $table->string('fr_banner_img')->nullable();
            $table->string('fr_banner_btn')->nullable();
            $table->string('fr_banner_link')->nullable();
            $table->string('fr_banner_text')->nullable();

            $table->string('ar_banner_img')->nullable();
            $table->string('ar_banner_btn')->nullable();
            $table->string('ar_banner_link')->nullable();
            $table->string('ar_banner_text')->nullable();

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
        Schema::dropIfExists('banners');
    }
}
