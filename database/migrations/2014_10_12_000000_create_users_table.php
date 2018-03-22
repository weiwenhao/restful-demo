<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('avatar');
            $table->char('openid', 28)->default('')->index();
            $table->unsignedInteger('sex')->default(0)->comment('0未知/1男/2女');
            $table->unsignedInteger('category_id')->default(0)->comment('当前坚持目标属于的分类');
            $table->unsignedInteger('goal_id')->default(0)->comment('当前坚持目标的id');
            $table->unsignedInteger('kept_days')->default(0)->comment('当前坚持目标 的坚持天数');
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
        Schema::dropIfExists('users');
    }
}
