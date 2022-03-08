<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            
            $table->id();
            $table->string('stock_name');
            $table->string('stock_slug')->unique();

            $table->string('color')->nullable();
            $table->string('dimension')->nullable();
            $table->string('weight')->nullable();
            $table->string('constructor')->nullable();
            $table->string('motif')->nullable();
            
            $table->foreignId('categorystock_id');
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
        Schema::dropIfExists('stocks');
    }
}
