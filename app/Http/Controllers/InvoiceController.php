<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id())
        {
            return view('store.index');
        }
        
    }
   
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required|numeric',
            'amount' => 'required|numeric',
            'customer_name' => 'required|regex:/^[A-Za-z ]+$/',
            'customer_email' => 'required|email',
        ]);
        $invoice = new Invoice([
            'name' => $request->input('customer_name'),
            'email' => $request->input('customer_email'),
            'amount' => $request->input('amount'),
            'tax' => $request->input('tax_amount'),
            'netamount' => $request->input('net_amount'),
            'currentDate' => $request->input('invoice_date'),
            'file_path' => $request->file('file_upload')->store('uploads'), 
            'qty' => $request->input('qty'),
        ]);
        $invoice->save();
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
