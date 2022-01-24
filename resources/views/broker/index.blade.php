@extends('layouts.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Broker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Broker</li>
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
                <h3 class="card-title">Lists of broker</h3>
                <div class="float-right">
                  <a href="{{url('brokers/create')}}">
                      <button class="btn btn-info">Create Broker</button>
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Broker Type</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($brokers as $index=>$broker)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>{{$broker->name}}</td>
                    <td>{{$broker->phone}}</td>
                    <td>{{$broker->address}}</td>
                    <td>{{$broker->broker_type}}</td>
                    <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="{{url('brokers/'.$broker->id.'/edit')}}" title="Edit">
                          <button class="btn btn-info"> 
                            <i class="fas fa-eye"></i>
                          </button>
                        </a>
                        <form action="{{url('brokers/'.$broker->id)}}" method="post" title="Delete">
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Broker Type</th>
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