<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'article_id';
    public $timestamps = false;
    public $guarded = ['article_id'];

    public function post(){
        return $this->belongsTo('App\Models\Users', 'article_user_id');
    }
}
