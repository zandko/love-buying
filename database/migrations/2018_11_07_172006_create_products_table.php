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
            $table->increments('id')->comment('商品编号');
            $table->unsignedInteger('category_id')->nullable()->comment('所属分类');
            $table->string('title')->comment('标题');
            $table->string('long_title')->comment('长标题');
            $table->text('description')->comment('详情');
            $table->boolean('on_sale')->default(true)->comment('是否上架');
            $table->string('image')->comment('封面图');
            $table->float('rating')->default(5)->comment('评分');
            $table->unsignedInteger('sold_count')->default(0)->comment('销量');
            $table->unsignedInteger('review_count')->default(0)->comment('评论');
            $table->decimal('price', 10, 2)->comment('最低价');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
