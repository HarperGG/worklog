<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopArticles extends Model
{
    protected $table = 'top_articles';
    protected $primaryKey = 'top_id';
    public $timestamps = false;
    public $guarded = ['top_id'];
}
