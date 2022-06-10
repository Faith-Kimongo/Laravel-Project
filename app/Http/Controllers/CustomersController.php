<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Company;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //index works just like list by listing files or so.
    public function index()
    {

        $customers = Customer::all();
        // $customers = Customer::inactive()->get();
 
        // dd($activeCustomers);


        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = company::all();

        return view('customers.create', compact('companies'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'company_id' => 'required',
            'active' => 'required'
        ]);

        //we are assigning data to our db massively everything in $data for this to not bring an error we use fillableor guarded in app\models\customer.php
        Customer::create($data);

        //we can get this data by using above one line.Assigning data to our db using specific steps
        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // // $customer->phone = request('phone');
        // $customer->active = request('active');
        // $customer->save();

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        // $customer = Customer::where('id', $customer)->firstorFail();
        
        return view('customers.show', compact('customer'));
    }
}
