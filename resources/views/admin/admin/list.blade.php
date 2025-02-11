@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total: {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
          </div>
        </div>
      </div>
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Search For Admin</strong></h3>
                      </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="get">
                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                          <label>Name</label>
                          <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-3">
                          <label >Email address</label>
                          <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-3">
                          <label >Date</label>
                          <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date" >
                        </div>
                        <div class="form-group col-md-3">
                         <button class="btn btn-primary" style="margin-top: 30px;">search</button>
                         <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top: 30px;">Clear</a>
                        </div>

                        </div>
                        
      
                      </div>
                      <!-- /.card-body -->
      
                    </form>
                  </div>
                  {{-- </div> --}}
                  <!-- /.card -->
      
      
      
      
      
                {{-- </div> --}}
      

            <!-- /.card -->
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th>Id</th> --}}
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   @foreach ($getRecord as $item)
                    <tr>
                        {{-- <td>{{ $item->id }}</td> --}}
                       <td>{{ $item->name }}</td>
                       <td>{{ $item->email }}</td>
                       <td>{{ $item->created_at}}</td>
                       <td>
                        <a class="btn btn-primary" href="{{ url('admin/admin/edit/'.$item->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ url('admin/admin/delete/'.$item->id) }}">Delete</a>
                    </td>
                    </tr>
                       
                       
                   @endforeach
                    
                  
                  </tbody>
                </table>
<div style="float: right; padding: 10px;">{!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}</div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
