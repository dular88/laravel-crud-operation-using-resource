<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::all();
       return view('crud.index')->with('customer',$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:my_auths',
            'mobile'=>'required|min:10|max:10',
        ]);
        
        $customer=new Customer;
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->mobile=$request->mobile;
        $query=$customer->save();

        if($query){
            return back()->with('success','Inserted successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $CustomerResource)
    {
        return view('crud.edit')->with('customer',$CustomerResource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $CustomerResource)
    {
        if($request->name===null || $request->email===null || $request->mobile===null){
            return back()->with('fail','All Fields are required !!!');
        }
        
       
        $CustomerResource->name=$request->name;
        $CustomerResource->email=$request->email;
        $CustomerResource->mobile=$request->mobile;
        $query=$CustomerResource->save();

        if($query){
            return redirect()->route('CustomerResources.index')->with('success','Updated Successfully');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $CustomerResource)
    {
       $query= $CustomerResource->delete();
       if($query){
        return back()->with('success','Deleted successfully');
        }
    }
}
