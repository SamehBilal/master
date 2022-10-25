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
            $table->longText('delivery_notes')->nullable();
            $table->unsignedBigInteger('tracking_no');
            $table->set('status', ['New','Awaiting your action','On hold','Canceled','Rescheduled','Out for delivery','Completed','Return to origin','Cannot be delivered'])->default('New');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->unsignedBigInteger('business_user_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();

            /* Deliver */
            $table->string('with_cash_collection')->nullable();
            $table->unsignedFloat('cash_on_delivery')->nullable();
            $table->string('package_type')->nullable();
            $table->string('light_bulky')->nullable();
            $table->longText('package_description')->nullable();
            $table->unsignedBigInteger('no_of_items')->nullable()->default(1);
            $table->string('order_reference')->nullable();
            $table->boolean('working_hours')->nullable()->default(0);
            $table->boolean('open_package')->nullable()->default(0);

            /* Exchange */
            $table->unsignedFloat('cash_exchange_amount')->nullable();
            $table->string('with_cash_difference')->nullable();
            $table->unsignedBigInteger('no_of_items_exchange')->nullable()->default(1);
            $table->longText('package_description_exchange')->nullable();
            $table->string('order_reference_exchange')->nullable();
            $table->boolean('allow_opening')->nullable()->default(0);
            $table->unsignedBigInteger('no_of_items_of_return_package_exchange')->nullable()->default(1);
            $table->longText('package_description_return_package_exchange')->nullable();

            /* Return */
            $table->unsignedFloat('refund_amount')->nullable();
            $table->string('with_refund')->nullable();
            $table->unsignedBigInteger('no_of_items_return')->nullable()->default(1);
            $table->longText('package_description_return')->nullable();
            $table->string('order_reference_return')->nullable();

            /* Cash Collection */
            $table->unsignedFloat('cash_to_collect')->nullable();
            $table->string('collect_cash')->nullable();
            $table->string('order_reference_cash_collection')->nullable();


            $table->unsignedBigInteger('return_location')->nullable();
            $table->unsignedBigInteger('return_location_exchange')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('pickup_id')->references('id')->on('pickups')->onDelete('SET NULL');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('SET NULL');
            $table->foreign('return_location')->references('id')->on('locations')->onDelete('SET NULL');
            $table->foreign('return_location_exchange')->references('id')->on('locations')->onDelete('SET NULL');
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
        Schema::dropIfExists('orders');
    }
}
