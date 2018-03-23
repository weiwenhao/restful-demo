<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLikeDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_like_diary', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('diary_id');
            $table->timestamp('created_at')->nullable();
            $table->unique(['user_id', 'diary_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_like_diary');
    }
}
