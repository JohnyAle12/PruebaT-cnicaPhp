<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use App\Events\CustomerUpdated;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        Auth::user()->autorizeRoles(['Administrator']);
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        Auth::user()->autorizeRoles(['Administrator']);
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        //Auth::user()->autorizeRoles(['Administrator']);
        $customer = new Customer;
        $customer->name = $request->get('name');
        $customer->email = $request->get('email');
        $customer->address = $request->get('address');
        $customer->gender = $request->get('gender');
        $customer->bith_date = $request->get('bith_date');
        $customer->users()->associate(Auth::user());
        $customer->save();

        return redirect()->route('cliente.create')->with('message', 'el cliente se ha creado con éxito.');
    }

    public function edit(Customer $customer)
    {
        Auth::user()->autorizeRoles(['Administrator']);
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        Auth::user()->autorizeRoles(['Administrator']);
        Customer::where('id', $customer->id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
            'bith_date' => $request->get('bith_date'),
        ]);

        event(new CustomerUpdated($customer));

        return redirect()->route('cliente.index')->with('message', 'el cliente se ha actualizado con éxito.');
    }

    public function destroy(Customer $customer)
    {
        Auth::user()->autorizeRoles(['Administrator']);
        Auth::user()->autorizeRoles(['Administrator']);
        Customer::where('id', $customer->id)->delete();
    }
}
