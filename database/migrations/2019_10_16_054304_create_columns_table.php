<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_columns', function (Blueprint $table) {
            $table->increments('navigation_id');
            $table->string('navigation_columns_name',100)->comment('分栏名');
            $table->string('navigation_jump_url',100)->comment('跳转的url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_columns');
    }
}
