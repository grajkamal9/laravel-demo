<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerLoanProperty extends Model
{
    use SoftDeletes;

    protected $table="CustomerLoanProperty";
    // protected $primaryKey = 'PropertyId';
    public $timestamps = false;

    protected $fillable = [ 'CustomerId', 'PropertyId', 'LoanId'];


    public function Customer()
    {
            return $this->belongsTo(Customer::class, 'CustomerId', 'CustomerId');
    }
}