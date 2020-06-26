<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('total')->default(0);
            $table->timestamps();

            $table->unique(['order_id', 'product_id']);

            $table->foreign('order_id')
                ->on('orders')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('product_id')
                ->on('products')
                ->references('id')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
