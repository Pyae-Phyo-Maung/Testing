<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Broker;
class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brokers = Broker::all();
        return view('broker.index',compact('brokers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('broker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'broker_type'=>'required'
        ]);
        Broker::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'broker_type'=>$request->broker_type
        ]);

        return redirect('brokers')->with('success','You have succeessfully created!');
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
        $broker = Broker::find($id);
        return view('broker.edit',compact('broker'));
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
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'broker_type'=>'required'
        ]);
        $broker = Broker::find($id);
        $broker->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'broker_type'=>$request->broker_type
        ]);
        return redirect('brokers')->with('success','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Broker::find($id)->delete();
        return back()->with('success','You have successfully deleted!');
    }
}
