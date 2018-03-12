<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 500)->default('')->comment('文本内容');
            $table->string('video')->default('')->comment('音频内容');
            $table->string('audio')->default('')->comment('音频内容');
            $table->string('images', 1000)->default('')->comment('图片内容, 多选  ,号分隔');
            $table->unsignedInteger('goal_id')->index()->comment('目标id');
            $table->unsignedInteger('category_id')->index()->comment('目标类别id');
            $table->unsignedInteger('user_id')->index()->comment('用户id');
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
        Schema::dropIfExists('diaries');
    }
}
