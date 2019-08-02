<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopUpHistory extends Model
{
    protected $connection = 'mysql';
    protected $table = "top_up_history";
}
