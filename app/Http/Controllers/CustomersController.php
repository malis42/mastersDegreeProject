<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();

        //$activeCustomers = Customer::where('active', 1)->get();
        //$inactiveCustomers = Customer::where('active', 0)->get();

        //$activeCustomers = Customer::active()->get();
        //$inactiveCustomers = Customer::inactive()->get();

        //$companies = Company::all();

        // var dupming
//        dd($customers);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();

        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerHasRegisteredEvent($customer));

        /*$customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();*/

        return redirect('customers');

        /*dd(Request('name'));*/
    }

    public function show(Customer $customer)
    {
        // Find customer with id of {{customer}}
        /*$customer = Customer::find($customer);*/

        // Safe way - if id not exists, return 404
        // Long way
        //$customer = Customer::where('id', $customer)->firstOrFail();
        // Short way
        //$customer = Customer::findOrFail($customer);

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'          => 'required | min:4 | max:20',
            'email'         => 'required | email ',
            'active'        => 'required',
            'company_id'    => 'required'
        ]);
    }
}
