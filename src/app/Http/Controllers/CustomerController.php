<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
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
    public function index(?string $id = null)
    {
        if(Auth::check())
        {
            $customers = Customer::all();
            // dump($customers);exit;
            return view('admin.customers', ['data' => ['customers' => $customers, 'id' => $id]]);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    
    function store(Request $request) {
        // dump($request->all());
        $customer = Customer::create($request->all());

        return response($customer, Response::HTTP_OK); 
    }

    function edit(Request $request) {
        // $customer = Customer::create($request->all());

        $customer = Customer::find($request->input('CustomerId'));
        $customer->FirstName = $request->input('FirstName');
        $customer->LastName = $request->input('LastName');
        $customer->ContactNo = $request->input('ContactNo');
        $customer->Email = $request->input('Email');
        $customer->Street = $request->input('Street');
        $customer->Pincode = $request->input('Pincode');
        $customer->State = $request->input('State');

        $customer->save(); 

        return response($customer, Response::HTTP_OK); 
    }

    function delete(?string $CustomerId = null) {
        // dump($request->input('CustomerId'));
        // $customer = Customer::create($request->all());

        if(!empty($CustomerId)){
            $response = Customer::where('CustomerId', $CustomerId)->delete();
            Property::where('CustomerId', $CustomerId)->delete();
        }else{
            return response([], Response::HTTP_BAD_REQUEST); 
        }
        

        return response($response, Response::HTTP_OK); 
    }

}
