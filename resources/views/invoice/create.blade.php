@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row pt-5">
        <div class="col-md-2">
            
        </div>
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary mt-4">
              <div class="card-header">
                <h3 class="card-title">Create invoice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('invoices')}}" method="post" id="quickForm">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                        <label for="broker_name">Broker Name</label>
                        <select class="form-control" name="broker_name" id="broker_name" required >
                        @foreach($brokers as $broker)
                          <option value="{{$broker->id}}">{{$broker->name}}</option>
                         @endforeach
                        </select>
                        @error('broker_type')
                        <span class="text-danger"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="invoice_no">Invoice No</label>
                    <input type="text" name="invoice_no" class="form-control" id="invoice_no" placeholder="Enter invoice number" required autofocus value="{{old('invoice_no')}}">
                    @error('invoice_no')
                    <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label>Date:</label>
                        <input type="text" class="form-control datetimepicker-input" id="datepicker"  data-target="#datepicker"  name="date" placeholder="Choose date" required autofocus >
                      @error('date')
                      <span class="text-danger"><small>{{$message}}</small></span>
                      @enderror
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
             <!-- left column -->
             <div class="col-md-2">
            
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    @endsection