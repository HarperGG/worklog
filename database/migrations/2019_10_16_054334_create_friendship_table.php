<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendship_links', function (Blueprint $table) {
            $table->increments('friendship_link_id');
            $table->string('friendship_link_title',100)->comment('标题');
            $table->string('friendship_link_click_url',100)->comment('点击的url');
            $table->integer('category_id')->comment('分类id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendship_links');
    }
}
