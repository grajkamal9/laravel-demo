<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
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
            // dump($customers);exit;
            return view('admin.properties', ['data' => ['properties' => $properties, 'customers' => $customers]]);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    
    function store(Request $request) {
        // dump($request->all());
        $property = Property::create($request->all());

        return response($property, Response::HTTP_OK); 
    }

    function edit(Request $request) {
        // $customer = Customer::create($request->all());
        
        //CustomerId Street Pincode State PropertySize Cost PropertyId
        
        
        $property = Property::find($request->input('PropertyId'));
        
        $property->Street = $request->input('Street');
        $property->Pincode = $request->input('Pincode');
        $property->State = $request->input('State');
        $property->PropertySize = $request->input('PropertySize');
        $property->Cost = $request->input('Cost');
        $property->CustomerId = $request->input('CustomerId');

        $property->save(); 

        return response($property, Response::HTTP_OK); 
    }

    function delete(?string $PropertyId = null) {

        if(!empty($PropertyId)){
            $response = Property::where('PropertyId', $PropertyId)->delete();
        }else{
            return response([], Response::HTTP_BAD_REQUEST); 
        }

        return response($response, Response::HTTP_OK); 
    }

}
