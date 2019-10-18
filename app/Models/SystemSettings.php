<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSettings extends Model
{
    public $timestamps = false;

    protected $table = 'system_settings';

    protected $primaryKey = 'system_setting_id';

    protected $guarded = ['system_setting_id'];
}
