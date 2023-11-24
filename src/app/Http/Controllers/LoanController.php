<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\CustomerLoanProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    /**
     * Instantiate 
     */
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
    }

    /**
     * Display a Customers to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $properties = Property::all();
            $customers = Customer::all();
            $loans = Loan::with(['Property', 'Customer'])->get();
            // // dump($loans);exit;
            // foreach($loans as $loans){
            //     if(!empty($loans->Property[0])){
            //        var_dump($loans->Property[0]->PropertyId); 
            //     }
                
            // }
            // exit;
            return view('admin.loans', ['data' => ['loans' => $loans, 'customers' => $customers, 'properties' => $properties]]);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    
    function store(Request $request) {
        // dump($request->all());
        $loan = Loan::create($request->all());
        CustomerLoanProperty::create(['CustomerId' => $request->input('CustomerId'), 'PropertyId' => $request->input('PropertyId'), 'LoanId' =>  $loan->LoanId]);

        return response($loan, Response::HTTP_OK); 
    }

    function edit(Request $request) {
        // $customer = Customer::create($request->all());
        
 //CustomerId, PropertyId, Bank, LoanAmount, IntrestRate, IntrestBanking, RepaymentAmount, InstallmentAmount, LoanStartDate, LoanEndDate
        $LoanId = $request->input('LoanId');
        $CustomerId = $request->input('CustomerId');
        
        $loan = Loan::find($LoanId);
        
        $loan->CustomerId = $CustomerId;
        $loan->Bank = $request->input('Bank');
        $loan->LoanAmount = $request->input('LoanAmount');
        $loan->IntrestRate = $request->input('IntrestRate');
        $loan->IntrestBanking = $request->input('IntrestBanking');
        $loan->RepaymentAmount = $request->input('RepaymentAmount');
        $loan->InstallmentAmount = $request->input('InstallmentAmount');
        $loan->LoanStartDate = $request->input('LoanStartDate');
        $loan->LoanEndDate = $request->input('LoanEndDate');

        $loan->save();

        CustomerLoanProperty::where('LoanId', $LoanId)->update([ 'CustomerId' => $CustomerId, 'PropertyId' => $request->input('PropertyId')]);
        return response($loan, Response::HTTP_OK); 
    }

    function delete(?string $LoanId = null) {

        if(!empty($LoanId)){
            CustomerLoanProperty::where('LoanId', $LoanId)->delete();
            $response = Loan::where('LoanId', $LoanId)->delete();
        }else{
            return response([], Response::HTTP_BAD_REQUEST); 
        }

        return response($response, Response::HTTP_OK); 
    }

}
