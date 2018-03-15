<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('modal_price')->nullable();
            $table->bigInteger('sell_price')->nullable();
            $table->integer('quantity')->default('1');
            $table->unsignedInteger('product_brand_id');
            $table->unsignedInteger('product_type_id');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_brand_id')
                ->references('id')
                ->on('product_brands')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->onDelete('cascade')
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
        Schema::dropIfExists('products');
    }
}
