<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id');
            $table->string('name')->comment('目标名称');
            $table->timestamp('began_at')->nullable()->comment('目标开始时间');
            $table->timestamp('ended_at')->nullable()->comment('结束时间');
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
        Schema::dropIfExists('goals');
    }
}
