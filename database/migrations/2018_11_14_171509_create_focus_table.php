<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFocusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('focus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('place')->comment('广告位置');
            $table->string('url')->nullable()->comment('链接');
            $table->string('image')->comment('封面图');
            $table->string('alt')->comment('简述');
            $table->string('remark')->nullable()->comment('备注');
            $table->unsignedInteger('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(false)->comment('状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('focus');
    }
}
