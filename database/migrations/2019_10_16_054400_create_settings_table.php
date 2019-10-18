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
            $table->string('system_setting_site_record_info')->nullable()->comment('备案');
            $table->string('system_setting_other')->nullable()->comment('其他');
            $table->longText('system_setting_wx_qrcode')->nullable()->comment('wx二维码的base64');
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
