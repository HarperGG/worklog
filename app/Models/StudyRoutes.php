<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyRoutes extends Model
{
    protected $table = 'study_routes';
    protected $primaryKey = 'route_id';
    public $timestamps = false;
    public $guarded = ['route_id'];
}
