<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctas', function (Blueprint $table) {
            $table->id();

            

            $table->string('fr_cta_img')->nullable();
            $table->string('fr_cta_btn')->nullable();
            $table->string('fr_cta_link')->nullable();
            $table->string('cta_fr_text')->nullable();

            $table->string('ar_cta_img')->nullable();
            $table->string('ar_cta_btn')->nullable();
            $table->string('ar_cta_link')->nullable();
            $table->string('ar_cta_text')->nullable();

            $table->string('en_cta_img')->nullable();
            $table->string('en_cta_btn')->nullable();
            $table->string('en_cta_link')->nullable();
            $table->string('en_cta_text')->nullable();

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
        Schema::dropIfExists('ctas');
    }
}
