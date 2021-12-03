<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fax')->nullable();
            $table->longtext('note')->nullable();
            $table->set('status',['active','inactive'])->nullable();
            $table->set('payment',['cash','visa'])->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('business_user_id')->nullable();
            $table->unsignedBigInteger('user_category_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_category_id')->references('id')->on('user_categories')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('business_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['id','user_id']);
            /*
            $table->unsignedBigInteger('bank_account_number')->nullable();
            $table->biginteger('default_payable_account')->nullable();
            $table->integer('vendor_to')->unsigned()->nullable();
            */
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
        Schema::dropIfExists('customers');
    }
}
