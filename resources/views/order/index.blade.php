@extends('layouts.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(Session('success'))
    <div class="alert alert-success">
      {{Session('success')}}
      <div class="closed" 
      data-dismiss="alert" 
      style="cursor:pointer;float:right;">
      &times;</div>
    </div>
    @endif
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lists of order</h3>
                <div class="float-right">
                  <a href="{{url('orders/create')}}">
                      <button class="btn btn-info">Create Order</button>
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Broker Name</th>
                    <th>Item Name</th>
                    <th>Original Qty</th>
                    <th>Remain Qty</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                
                 @foreach($orders as $key=>$order)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$order->invoice_id}}</td>
                    <td>{{$order->item_id}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->price}}</td>
                    <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="{{url('orders/'.$order->id.'/edit')}}" title="Edit">
                          <button class="btn btn-info"> 
                            <i class="fas fa-eye"></i>
                          </button>
                        </a>
                        <form action="{{url('orders/'.$order->id)}}" method="post" title="Delete">
                          @csrf
                          @method('DELETE')
                        <button type="submit"
                         class="btn btn-danger"
                         onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></button>
                      </form>
                      </div>
                    </td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>Broker Name</th>
                    <th>Item Name</th>
                    <th>Original Qty</th>
                    <th>Remain Qty</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('script')
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
  @endsection