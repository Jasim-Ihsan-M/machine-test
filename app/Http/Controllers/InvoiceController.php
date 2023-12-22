<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvoiceEmail; 



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            
            return view('store.index');
        } else {
            return redirect()->route('login'); 
        }
    }
    public function showAll()
    {
        $invoices = Invoice::all();
        return view('store.invoice', compact('invoices'));
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
        $emailData = [
            'invoiceDate' => $request->input('invoice_date'),
            'taxAmount' => $request->input('tax_amount'),
            'invoiceAmount' => $request->input('net_amount'),
        ];
    
        Mail::to($request->input('customer_email'))
            ->send(new InvoiceEmail($emailData['invoiceDate'], $emailData['taxAmount'], $emailData['invoiceAmount']));
    
        
        return redirect()->route('store.invoice')->with('success', 'Invoice created successfully and email sent');
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
        $invoice = Invoice::findOrFail($id);
        return view('store.show', compact('invoice'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $invoice = Invoice::findOrFail($id);
        // return view('store.edit', compact('invoice'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::findOrFail($id);
    
        $request->validate([
            'qty' => 'required|numeric',
            'amount' => 'required|numeric',
            'customer_name' => 'required|regex:/^[A-Za-z ]+$/',
            'customer_email' => 'required|email',
        ]);
    
        // Update the invoice with the new data
        $invoice->update([
            'name' => $request->input('customer_name'),
            'email' => $request->input('customer_email'),
            'amount' => $request->input('amount'),
            'tax' => $request->input('tax_amount'),
            'netamount' => $request->input('net_amount'),
            'currentDate' => $request->input('invoice_date'),
            'qty' => $request->input('qty'),
        ]);
    
        return redirect()->route('store.invoice')->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        
        return redirect()->back()->with('success', 'Invoice deleted successfully');

    }
}
