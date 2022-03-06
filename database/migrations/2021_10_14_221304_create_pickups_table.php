<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pickup_id');
            $table->set('type', ['One Time', 'Daily', 'Weekly'])->default('One Time');
            $table->dateTime('scheduled_date')->nullable();
            $table->set('status', ['Created','Out for pickup'])->default('Created');
            $table->longText('notes')->nullable();
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('business_user_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('business_user_id')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('pickups');
    }
}
