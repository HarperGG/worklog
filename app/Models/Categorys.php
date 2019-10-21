<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    protected $table = 'categorys';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    public $guarded = ['category_id'];


    public function child()
    {
        return $this->hasMany(get_class($this), 'category_index', 'category_id');
    }
    public function allChild()
    {
        return $this->child()->with('allChild');
    }
}
