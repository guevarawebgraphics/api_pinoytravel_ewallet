<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    protected $connection = 'mysql';
    protected $table = "transaction_details";
}
