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
            $table->set('type', ['Deliver', 'Exchange', 'Return', 'Cash Collection']);
            $table->unsignedBigInteger('tracking_no');
            $table->unsignedFloat('cash_on_delivery');
            $table->string('order_reference')->nullable();
            $table->string('package_type')->nullable();
            $table->longText('package_description')->nullable();
            $table->set('status', ['New','Awaiting your action','On hold','Canceled','Rescheduled','Out for delivery','Completed','Return to origin','Cannot be delivered'])->default('New');
            $table->unsignedBigInteger('no_of_items')->nullable();
            $table->longText('delivery_notes')->nullable();
            $table->boolean('open_package')->default(1);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('pickup_id')->references('id')->on('pickups')->onDelete('SET NULL');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('SET NULL');
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
        Schema::dropIfExists('orders');
    }
}
