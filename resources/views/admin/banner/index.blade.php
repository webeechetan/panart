@extends('layouts.admin')
@section('title') Manage Gallery @endsection
@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Gallery</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Banners</li></ol>
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
                     
                    <a class="btn btn-success addcls" href="{{route('banner.create')}}"><i class="fa fa-plus"></i> Add New</a>    
                    
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
                  <th>Title</th>
                  <th>Type</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($info as $value)
                  <tr>
                    <td>{{$value->title}}</td>
                    <td>{{ucfirst($value->banner_type)}}</td>
                    
      
                      <td id="parentactive-{{$value->id}}">
                        @if($value->status==1)
                        <a href="javascript:;" data-tbl="banne"  class="btn btn-xs btn-success actinact" data-id="{{$value->id}}" data-value="0">Active</a>
                        @else
                        <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="banne" data-id="{{$value->id}}" data-value="1">Inactive</a>
                        @endif
                      </td>  

                    <td>
                      <form action="{{ route('banner.destroy',$value->id) }}" method="POST" class="delete">
                      <a href="{{ route('banner.edit', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit"></i></a>
                      @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn btn-xs btn-info btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                     </td>
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