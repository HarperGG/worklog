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
            $table->increments('user_id');
            $table->string('user_student_number',11)->comment('学号');
            $table->string('user_name', 100)->comment('姓名');
            $table->string('user_grade', 100)->comment('年级');
            $table->string('user_major', 100)->comment('专业');
            $table->string('user_password', 100)->comment('密码');
            $table->string('user_token', 100)->nullable()->comment('token');
            $table->string('user_permissions', 1)->default('1')->comment('0 为超级管理员，1可读可发，2可读不可发');
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
