<?php

namespace App\Models;

class Users extends \Illuminate\Foundation\Auth\User implements \Illuminate\Contracts\Auth\Authenticatable
{
    public $timestamps = false;

    protected $rememberTokenName = NULL;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = ['user_student_number', 'user_name', 'user_grade', 'user_major', 'user_password', 'user_token', 'user_permissions'];

    protected $hidden = [
        'user_password',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }
    public function articles()
    {
        return $this->hasMany('App\Models\Articles', 'article_user_id')->orderBy('article_create_time', 'desc');
    }
    public function artileCreateTime()
    {
        return $this->hasMany('App\Models\Articles', 'article_user_id', 'user_id')->select('article_create_time')->limit(1)->orderBy('article_create_time', 'desc');
    }
}
