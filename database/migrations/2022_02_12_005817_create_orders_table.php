<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->text('comment')->nullable();
           
            $table->enum('order_status', ['pending', 'completed'])->default('pending');
            $table->enum('currency', ['dollar', 'euro'])->default('dollar');
           
            $table->string('payment_mode');
            $table->string('shipping_address');
            
            $table->string('total_ht');
            $table->string('total_ttc');
            $table->string('discount_amount');

           
            $table->foreignId('user_id');
            $table->foreignId('coupon_id');

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
        Schema::dropIfExists('orders');
    }
}
