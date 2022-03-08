<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentproducts', function (Blueprint $table) {
            $table->id();
            
           
            $table->text('comment')->nullable();
            $table->foreignId('product_id');
            $table->foreignId('user_id');
            $table->foreignId('ratingproduct_id');
            
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
        Schema::dropIfExists('commentproducts');
    }
}
