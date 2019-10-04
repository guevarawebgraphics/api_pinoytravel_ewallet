<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminHistory extends Model
{
    protected $connection = 'mysql';
    protected $table = "admin_history";
}
