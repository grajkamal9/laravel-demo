<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;
use App\Models\Property;

class Loan extends Model
{
    protected $table="Loan";
    protected $primaryKey = 'LoanId';
    public $timestamps = false;

    protected $fillable = [ 'LoanId', 'CustomerId', 'Bank', 'LoanAmount', 'IntrestRate', 'IntrestBanking', 'RepaymentAmount', 'InstallmentAmount', 'LoanStartDate', 'LoanEndDate'];

    //   `LoanId`,  `CustomerId`, LEFT(`Bank`, 256),  `LoanAmount`,  `IntrestRate`,  `IntrestBanking`,  `RepaymentAmount`,  `InstallmentAmount`, LEFT(`LoanStartDate`, 256), LEFT(`LoanEndDate`, 256),
    
    public function Customer()
    {
        //     return $this->belongsToMany(Customer::class, 'CustomerLoanProperty', 'LoanId', 'CustomerId');
            return $this->hasOne(Customer::class, 'CustomerId', 'CustomerId');
    }

    public function Property()
    {
                return $this->belongsToMany(Property::class, 'CustomerLoanProperty', 'LoanId', 'PropertyId');
        //     return $this->hasOne(Property::class, 'PropertyId', 'PropertyId');
    }

}