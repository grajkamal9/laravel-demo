<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="Customer";
    protected $primaryKey = 'CustomerId';
    public $timestamps = false;

    protected $fillable = [ 'ContactNo', 'FirstName', 'LastName', 'Street', 'Pincode', 'State', 'Email'];
}