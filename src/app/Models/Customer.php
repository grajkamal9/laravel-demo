<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use SoftDeletes;

    protected $table="Customer";
    protected $primaryKey = 'CustomerId';
    public $timestamps = false;

    protected $fillable = [ 'ContactNo', 'FirstName', 'LastName', 'Street', 'Pincode', 'State', 'Email'];

    public function Property()
    {
        // model, column of customer table, column of Property table
        return $this->hasMany('App\Models\Property', 'CustomerId', 'CustomerId');

    }
}