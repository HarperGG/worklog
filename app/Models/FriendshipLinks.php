<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendshipLinks extends Model
{
    protected $table = 'friendship_links';
    protected $primaryKey = 'friendship_link_id';
    public $timestamps = false;
    public $guarded = ['friendship_link_id'];
}
