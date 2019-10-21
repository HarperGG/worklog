<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSettings extends Model
{
    protected $table = 'system_settings';
    protected $primaryKey = 'system_setting_id';
    public $timestamps = false;
    public $guarded = ['system_setting_id'];
}
