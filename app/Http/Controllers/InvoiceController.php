<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broker;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokers = Broker::all();
        return view('invoice.create',compact('brokers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $validate = $request->validate([
            'broker_name'=>'required',
            'invoice_no'=>'required',
            'date'=>'required',
        ]);
        Invoice::create([
            'broker_id'=>$request->broker_name,
            'invoice_no'=>$request->invoice_no,
            'date'=>$request->date,
        ]);

        return redirect('invoices')->with('success','You have succeessfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brokers = Broker::all();
        $invoice = Invoice::find($id);
        return view('invoice.edit',compact('invoice','brokers'));
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
        $validate = $request->validate([
            'broker_name'=>'required',
            'invoice_no'=>'required',
            'date'=>'required',
        ]);
        $invoice = Invoice::find($id);
        $invoice->update([
            'broker_id'=>$request->broker_name,
            'invoice_no'=>$request->invoice_no,
            'date'=>$request->date,
        ]);

        return redirect('invoices')->with('success','You have succeessfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return back()->with('success','You have succeessfully deleted!');
    }
}
