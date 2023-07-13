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
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('note')->nullable();
            $table->string('address');
            $table->string('phone_number');
            $table->string('payment_method');
            $table->string('quantity')->nullable();
            $table->string('cash_app_tag')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('order_status')->default('pending');
            $table->double('amount')->nullable();
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
