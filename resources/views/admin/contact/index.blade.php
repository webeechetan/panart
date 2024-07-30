@extends('layouts.admin')
@section('title') Manage Customer @endsection
@section('main-content')
<style>
.btn-danger{padding:6px 12px;}
.lt_serach{width: 100%;overflow: hidden;max-width: 500px;margin-bottom: 10px;}
.lt_serach input.first{float: left;max-width: 150px;margin-right: 10px;}
.lt_serach input.second{max-width: 150px;margin-right: 10px;}
.lt_serach input.third{max-width: 150px;float: right;}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Contact Us</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Contact Us</li></ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
           
            {{ showMessage() }}


              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
                  @foreach($info as $value)
                  <tr>
					          <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->mobile}}</td>
                    <td>{{$value->message}}</td>  
                    <td>{{$value->created_at}}</td>
                    <td>#</td>
                    
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

@endsection