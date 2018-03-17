<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('payment_id');
            $table->integer('quantity');
            $table->bigInteger('discount')->nullable();
            $table->bigInteger('total_price');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade');

            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_product');
    }
}
