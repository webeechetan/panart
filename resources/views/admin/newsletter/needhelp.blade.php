@extends('layouts.admin')
@section('title') Manage Need Help @endsection
@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Newsletter</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Enquiry</li></ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          

          <div class="box">
            <div class="box-header">
             <!--  <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="row">
                <div class="col-md-12">
                  <div class="pull-right">
                    
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">           
              {{ showMessage() }}

              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Product</th>
                  <th>Sku</th>
                  <th>Created Date</th>
                   <!-- <th>Status</th>
                  <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  @foreach($info as $value)
                  <tr>
                    <td>{{$value->name}}</td>                    
                    <td>{{$value->email}}</td>                    
                    <td>{{$value->phone}}</td>                    
                    <td>{{$value->product_name}}</td>                    
                    <td>{{$value->sku}}</td>                    
                    <td>{{(date('d-M-Y',strtotime($value->created_at)))}}</td>
                    
                  </tr>
                  @endforeach
                



                </tfoot>
              </table>
                <div class="pagenaction_cls">  {!!  $info->links() !!} </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
  </script>
@endsection