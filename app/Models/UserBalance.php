<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    protected $connection = 'mysql';
    protected $table = "userbal";
}
