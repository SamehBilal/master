<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('other_phone')->nullable();
            $table->string('avatar')->nullable();
            $table->longtext('note')->nullable();
            $table->set('status',['active','inactive'])->nullable();
            $table->set('payment',['cash','visa'])->nullable();
            $table->unsignedBigInteger('business_user_id')->nullable();
            $table->unsignedBigInteger('user_category_id')->nullable();
            $table->foreign('user_category_id')->references('id')->on('user_categories')->onDelete('cascade');
            $table->foreign('business_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
