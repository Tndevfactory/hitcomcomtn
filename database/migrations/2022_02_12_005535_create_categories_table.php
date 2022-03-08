<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            $table->string('fr_category_name');
            $table->string('en_category_name');
            $table->string('ar_category_name');

            $table->string('category_image');
            $table->string('icon')->default('fa-brands fa-app-store-ios');
            
            $table->string('category_slug')->unique();
           
            
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropSoftDeletes();
        Schema::dropIfExists('categories');
    }
}
