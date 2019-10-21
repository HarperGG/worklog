<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverPictures extends Model
{
    protected $table = 'cover_pictures';
    protected $primaryKey = 'cover_picture_id';
    public $timestamps = false;
    public $guarded = ['cover_picture_id'];
}
