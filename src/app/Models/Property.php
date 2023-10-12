<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $table="Property";
    protected $primaryKey = 'PropertyId';
    public $timestamps = false;

    protected $fillable = [ 'CustomerId', 'Street', 'Pincode', 'State', 'PropertySize', 'Cost'];


    public function Customer()
    {
            return $this->belongsTo(Customer::class, 'CustomerId', 'CustomerId');
    }
}