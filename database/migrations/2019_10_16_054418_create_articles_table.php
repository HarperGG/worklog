<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('article_title',100)->comment('标题');
            $table->string('article_intro')->comment('简介');
            $table->longText('article_content')->comment('内容');
            $table->integer('article_user_id')->comment('发表人id');
            $table->integer('article_category_id')->comment('分类表id');
            $table->string('article_state',1)->comment('状态');
            $table->dateTime('article_create_time')->comment('发表时间');
            $table->dateTime('article_update_time')->comment('更新时间');
            $table->integer('cover_picture_id')->comment('封面id');
            $table->string('article_video_id',100)->comment('视频id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
