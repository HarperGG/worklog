<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_routes', function (Blueprint $table) {
            $table->increments('study_route_id');
            $table->string('study_route_title')->comment('标题');
            $table->string('study_route_intro')->comment('简介');
            $table->longText('study_route_content')->comment('内容');
            $table->integer('category_id')->comment('分类id');
            $table->string('study_route_state',1)->comment('状态 0为禁用 1为启用');
            $table->dateTime('study_route_create_time')->comment('填写时间');
            $table->dateTime('study_route_update_time')->comment('更新时间');
            $table->integer('study_route_cover_picture_id')->comment('封面图id');
            $table->string('study_route_cover_video_id',100)->comment('视频id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_routes');
    }
}
