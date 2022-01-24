<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokers = Broker::all();
        return view('item.create',compact('brokers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $broker_name = $request->broker_name;
            $group = $request->group;
             //dd($group);
            foreach($group as $key=>$item){
                Item::create([
                    'broker_id'=>$broker_name,
                    'name'=>$group[$key]['name'],
                    'original_qty'=>$group[$key]['original_qty'],
                    'remain_qty'=>$group[$key]['original_qty'],
                    'price'=>$group[$key]['price']
                ]);
             }
        return redirect('items')->with('success','You have succeessfully created!');
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
        $item = Item::find($id);
        $item->update([
            'broker_id'=>$request->broker_name,
            'name'=>$request->name,
            'original_qty'=>$request->original_qty,
            'remain_qty'=>$request->remain_qty,
            'price'=>$request->price
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
        Item::find($id)->delete();
        return back()->with('success','You have successfully deleted!');
    }
}
