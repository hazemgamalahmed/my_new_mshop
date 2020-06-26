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
            $table->dateTime('date');
            $table->unsignedBigInteger('client_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->float('total_amount')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')
                ->on('clients')
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
        Schema::dropIfExists('orders');
    }
}
