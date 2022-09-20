<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->unsignedBigInteger('hub_id')->nullable();
            $table->foreign('pickup_id')->references('id')->on('pickups')->onDelete('SET NULL');
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('SET NULL');
            $table->set('status',['Created','Out for pickup','Picked up'])->nullable();
            $table->set('description',
                [
                    'It is expected to pickup your order at pickup date.',
                    'Your order is out for pickup soon.',
                    'Your order has been picked up and is expected to be delivered to customer soon.',
                ]
            )->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('pickup_logs');
    }
}
