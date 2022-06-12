<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
            $table->foreign('pickup_id')->references('id')->on('pickups')->onDelete('SET NULL');
            $table->foreign('courier_id')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('courier_logs');
    }
}
