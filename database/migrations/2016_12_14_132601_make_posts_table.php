<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('text');
            $table->timestamps();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('email');
            $table->text('comment');
            $table->integer('post_id');
            $table->timestamps();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
        Schema::drop('posts');
    }
}
