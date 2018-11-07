<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('分类编号');
            $table->string('name')->comment('分类名称');
            $table->unsignedInteger('parent_id')->nullable()->comment('上级分类');
            $table->boolean('is_directory')->comment('是否拥有子级分类');
            $table->unsignedInteger('level')->comment('当前分类级别');
            $table->string('path')->comment('当前分类所有父级分类ID');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
