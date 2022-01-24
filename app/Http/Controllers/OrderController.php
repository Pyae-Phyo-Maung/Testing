<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Invoice;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $invoices = Invoice::all();
        //dd($invoices);
        return view('order.create',compact('items','invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $group = $request->group;
             //dd($group);
            foreach($group as $key=>$item){
                Item::create([
                    'invoice_id'=>$group[$key]['invoice_name'],
                    'item_id'=>$group[$key]['item_name'],
                    'qty'=>$group[$key]['qty'],
                    'price'=>$group[$key]['price']
                ]);
             }
             return redirect('orders')->with('success','You have succeessfully created!');
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
        $item = Item::find($id);
        return view('item.edit',compact('item','brokers'));
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
        $order = Order::find($id);
        $order->update([
            'invoice_id'=>$request->invoice_name,
            'item_di'=>$request->item_name,
            'price'=>$request->price,
            'qty'=>$request->qty
           
        ]);
        return redirect('items')->with('success','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return back()->with('success','You have successfully deleted!');
    }
}
