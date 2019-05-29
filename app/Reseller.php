<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    //Table name 
    // protected $table = 'reseller';
    //Primary key
    //public $primaryKey = 'id'
    protected $primaryKey = 'reseller_id';
    // protected $fillable =['name', 'email', 'address', 'contact_no'];
    // protected $guarded = [];
}