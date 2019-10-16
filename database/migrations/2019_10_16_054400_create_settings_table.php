<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->increments('system_setting_id');
            $table->string('system_setting_site_record_info')->comment('备案');
            $table->string('system_setting_other')->comment('其他');
            $table->longText('system_setting_wx_qrcode')->comment('wx二维码的base64');
            $table->string('system_accessKeyId')->comment('ALIYUN_accessKeyId');
            $table->string('system_accessKeySecret')->comment('ALIYUN_accessKeySecret');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings');
    }
}
