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
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('other_email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->set('gender', ['Male', 'Female'])->nullable();
            $table->set('religion', ['Islam', 'Christianity'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('avatar')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('other_phone')->nullable();
            $table->boolean('status')->default(1);
            $table->longText('bio')->nullable();
            $table->unsignedBigInteger('user_category_id')->nullable();
            $table->foreign('user_category_id')->references('id')->on('user_categories')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->index(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
