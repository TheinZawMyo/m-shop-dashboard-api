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
            $table->bigIncrements('p_id');
            $table->string('p_name', 100)->nullable();
            $table->integer('price')->nullable();
            $table->string('p_image')->nullable();
            $table->text('specs')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('stock')->default(true);
            $table->unsignedBigInteger('b_id');
            $table->timestamps();
            $table->foreign('b_id')->references('b_id')->on('brands')->onDelete('cascade');
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
