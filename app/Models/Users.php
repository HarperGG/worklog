<?php

namespace App\Models;

class Users extends \Illuminate\Foundation\Auth\User implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $rememberTokenName = NULL;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $fillable = ['user_student_number', 'user_name', 'user_grade', 'user_major', 'user_password', 'user_token', 'user_permissions'];

    protected $hidden = [
        'user_password',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
