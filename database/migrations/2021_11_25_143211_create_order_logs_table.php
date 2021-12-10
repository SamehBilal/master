<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
            $table->set('status',['New','Picked up','In transit','Out for delivery','Delivered'])->nullable();
            $table->set('description',
                ['It is expected to be pickup your order at pickup date.',
                'Your order has been picked up and is expected to be in transit soon.',
                'Your order has been in transit and is expected to be delivered to customer soon.',
                'Your order is out for delivery and is expected to be delivered to customer soon.',
                'Your order has been delivered to customer.']
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
        Schema::dropIfExists('order_logs');
    }
}
