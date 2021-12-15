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
            $table->bigIncrements('o_id');
            $table->string('order_id')->nullable();
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('p_id');
            $table->boolean('apt_rjt_order')->default(true);
            $table->timestamps();
            $table->foreign('u_id')->references('u_id')->on('users')->onDelete('cascade');
            $table->foreign('p_id')->references('p_id')->on('products')->onDelete('cascade');

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