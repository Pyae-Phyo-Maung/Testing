@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Item</h1>
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
                <h3 class="card-title">Update item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('items/'.$item->id)}}" method="post"  id="quickForm">
                  @csrf
                  @method('PATCH')
                <div class="card-body">
               
                  
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="broker_name" id="broker_name" class="form-control">
                        @foreach($brokers as $broker)
                        <option value="{{$broker->id}}"
                        {{$item->broker_id == $broker->id?'selected':''}}
                        >{{$broker->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="name">Item Name</label>
                        <input type="text" name="name" value="{{$item->name}}"  class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="original_qty">Original Qty</label>
                        <input type="number" name="original_qty" value="{{$item->original_qty}}" required class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="remain_qty">Remain Qty</label>
                        <input type="number" name="remain_qty" value="{{$item->remain_qty}}" required class="form-control"/>
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
