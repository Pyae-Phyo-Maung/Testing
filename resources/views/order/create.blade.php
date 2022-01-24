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
                <h3 class="card-title">Create order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="repeater" method="post" action="{{url('orders')}}">
              @csrf
               
                <div data-repeater-list="group" class="container mt-5">
                  <div data-repeater-item>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="invoice_name">Invoice Name</label>
                        <select name="invoice_name" id="invoice_name" class="form-control">
                        @foreach($invoices as $invoice)
                        <option value="{{$invoice->id}}">{{$invoice->invoice_no}}</option>
                        @endforeach
                         </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <select name="item_name" id="item_name" class="form-control">
                        @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                         </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" value="{{old('qty')}}" class="form-control"/>
                       
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{old('price')}}"  class="form-control"/>
                        
                      </div>
                    </div>
                    <div class="col-md-2 mt-4">
                    <input data-repeater-delete type="button" value="Delete" class="btn btn-sm btn-danger"/>
                    </div>
                  </div>
                   
                   
                  </div>
                </div>
                
                <input data-repeater-create type="button" class="btn btn-success" value="Add" style="margin-left:20px;margin-bottom:10px;"/>
                <button class="btn btn-primary" type="submit"  style="margin-bottom:10px;">Create Item</button>
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
