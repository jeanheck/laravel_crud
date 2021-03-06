<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = $this->customer;
        $filteredName = $request->query->get('name');

        if($filteredName){
            $customers = $this->customer->where('name', 'like', "%$filteredName%");
        }

        $customers = $customers->paginate(5);
        $active = "customers";
        return view('customer/index', compact('customers', 'filteredName', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'customers';

        return view('customer/create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCustomer = $this->customer->create([
            'name'=>$request->name
		]);

		if($newCustomer){
			return redirect('customers')->with('success','Item created successfully!');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->customer->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customer->find($id);
        $active = "customers";

        return view('customer/edit', compact('customer', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editCustomer = $this->customer->where(['id'=>$id])->update([
            'name'=>$request->EditCustomerName
		]);

        if($editCustomer){
			return redirect('customers');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->customer->destroy($id);
        return $del ? "sim" : "não";
    }
}
