<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocked extends Model
{
    protected $table = 'blocked_commenters';
    public $timestamps = false;
}
