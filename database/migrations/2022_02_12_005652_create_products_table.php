<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('fr_product_name');
            $table->string('en_product_name');
            $table->string('ar_product_name');
           
            $table->string('product_slug');

            $table->mediumText('fr_description');
            $table->mediumText('en_description');
            $table->mediumText('ar_description');

            $table->decimal('price', 20,2);
            $table->decimal('discount', 20,2)->nullable();
            

            $table->enum('status', ['sold', 'available', 'stolen', 'damaged', 'on_demand','other'])->default('available'); 
           
            $table->foreignId('subcategory_id');
           
            $table->foreignId('stock_id');

            $table->foreignId('seller_id');

            $table->foreignId('fee_id');

            $table->foreignId('tax_id');
            
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
        Schema::dropIfExists('products');
    }
}
