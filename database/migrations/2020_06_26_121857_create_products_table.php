<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedFloat('price');
            $table->unsignedInteger('reorder_point')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('user_id')
                ->on('users')
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
        Schema::dropIfExists('products');
    }
}
