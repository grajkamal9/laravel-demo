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

}
