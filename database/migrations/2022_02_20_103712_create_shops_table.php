<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            
            $table->string('fr_shop_name')->default('hitcom'); ;
            $table->string('en_shop_name')->default('hitcom'); ;
            $table->string('ar_shop_name')->default('hitcom'); ;
           
            $table->mediumText('fr_shop_description')->nullable(); 
            $table->mediumText('en_shop_description')->nullable(); 
            $table->mediumText('ar_shop_description')->nullable(); 

            $table->string('shop_slug')->nullable();
            
            $table->string('shop_address'); 
            $table->string('city')->nullable(); 

            $table->string('shop_phone1'); 
            $table->string('shop_phone2')->nullable(); 

            

            $table->string('shop_category')->nullable(); 
         
            $table->dateTime('shop_creation_date')->nullable(); 

            $table->string('seller_fiscal_id')->nullable(); 

            $table->enum('active', [0, 1])->default(0);

            $table->string('shop_email')->nullable();
            
            $table->string('shop_image')->default('media/users/empty-user.jpg');

            $table->foreignId('user_id');
            
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
        Schema::dropIfExists('shops');
    }
}
