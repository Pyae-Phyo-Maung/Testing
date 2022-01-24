@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Item</li>
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
                <h3 class="card-title">Create item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="repeater" method="post" action="{{url('items')}}">
              @csrf
                <div class="row mt-5">
                  <div class="col-md-4" >
                  <label for="broker_name" style="margin-left:200px;">Broker Name</label>
                  </div>
                  <div class="col-md-4">
                  <select name="broker_name" id="broker_name" class="form-control">
                    @foreach($brokers as $broker)
                    <option value="{{$broker->id}}">{{$broker->name}}</option>
                    @endforeach
                  </select>
                  @error('broker_name')
                  <span class="text-danger"><small>{{$message}}</small></span>
                  @enderror
                  </div>
                </div>
                  
                <div data-repeater-list="group" class="container mt-5">
                  <div data-repeater-item>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" name="name" value="{{old('name')}}"  class="form-control"/>
                        @error('name')
                        <span class="text-danger"><small>{{$message}}</small></span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="original_qty">Original Qty</label>
                        <input type="number" name="original_qty" value="{{old('original_qty')}}" class="form-control"/>
                       
                      </div>
                    </div>
                    
                    <div class="col-md-3">
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
