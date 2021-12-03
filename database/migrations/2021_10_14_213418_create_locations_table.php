<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street')->nullable();
            $table->string('building',20)->nullable();
            $table->string('floor',20)->nullable();
            $table->string('apartment',20)->nullable();
            $table->string('landmarks')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('business_user_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('SET NULL');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('SET NULL');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('SET NULL');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('SET NULL');
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
        Schema::dropIfExists('locations');
    }
}
