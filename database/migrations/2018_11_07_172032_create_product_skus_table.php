<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->increments('id')->comment('规格编号');
            $table->unsignedInteger('product_id')->comment('所属商品');
            $table->string('title')->comment('规格');
            $table->string('description')->comment('简介');
            $table->decimal('price')->comment('单价');
            $table->unsignedInteger('stock')->comment('库存');
            $table->string('image')->nullable()->comment('规格图片');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_skus');
    }
}
