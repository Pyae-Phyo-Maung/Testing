@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Broker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Broker</li>
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
                <h3 class="card-title">Create broker</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('brokers')}}" method="post" id="quickForm">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" required autofocus value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required autofocus value="{{old('phone')}}">
                    @error('phone')
                    <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="10" rows="4" class="form-control" placeholder="Enter address" autofocus required >{{old('address')}}</textarea>
                    @error('content')
                    <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="broker_type">Broker Type</label>
                        <select class="form-control" name="broker_type" id="broker_type" required >
                          <option value="buyer">buyer</option>
                          <option value="seller">seller</option>
                        </select>
                        @error('broker_type')
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