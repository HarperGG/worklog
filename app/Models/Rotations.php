<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rotations extends Model
{
    protected $table = 'rotations';
    protected $primaryKey = 'rotation_id';
    public $timestamps = false;
    public $guarded = ['rotation_id'];
}
