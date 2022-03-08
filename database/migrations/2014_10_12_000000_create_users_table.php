<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->enum('role', ['client', 'manager', 'seller', 'admin', 'superuser', 'system'])->default('client'); 
            $table->string('address'); 
            $table->string('shipment_address')->nullable(); 
            $table->mediumText('technical_details')->nullable();
            $table->string('city')->nullable(); 
            $table->string('phone1'); 
            $table->string('phone2')->nullable(); 
            $table->string('fb_user_id')->nullable(); 
            $table->string('mac_address')->nullable();
            $table->string('genre')->nullable(); 
            $table->string('dob')->nullable(); 
            $table->enum('active', [0, 1])->default(1);
            $table->string('email')->unique();
            $table->string('user_image')->default('media/users/empty-user.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
       
    }
}
