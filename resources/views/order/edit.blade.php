@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary mt-4">
              <div class="card-header">
                <h3 class="card-title">Update order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('orders/'.$order->id)}}" method="post"  id="quickForm">
                  @csrf
                  @method('PATCH')
                <div class="card-body">
               
                  
                    <div class="form-group">
                        <label for="invoice_name">Invoice Name</label>
                        <select name="invoice_name" id="invoice_name" class="form-control">
                        @foreach($invoices as $invoice)
                        <option value="{{$invoice->id}}"
                        {{$order->invoice_id == $invoice->id?'selected':''}}
                        >{{$invoice->invoice_no}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <select name="item_name" id="item_name" class="form-control">
                        @foreach($items as $item)
                        <option value="{{$item->id}}"
                        {{$order->item_id == $item->id?'selected':''}}
                        >{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" value="{{$order->qty}}" required class="form-control"/>
                    </div>
                   
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{$item->price}}"  class="form-control"/>
                    </div>
                
                   
                 
               
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
             <!-- left column -->
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
