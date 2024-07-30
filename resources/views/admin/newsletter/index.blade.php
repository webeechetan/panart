@extends('layouts.admin')
@section('title') Manage Newsletter @endsection
@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Newsletter</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Newsletter</li></ol>
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
                    <a href="{{ route('export_excel.excel') }}" class="btn btn-success pull-right">Export to Excel</a>
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Created Date</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($info as $value)
                  <tr>
                    <td>{{$value->email}}</td>                    
                    <td>{{(date('d-M-Y',strtotime($value->created_at)))}}</td>
                    <td id="parentactive-{{$value->id}}">
                      @if($value->status==1)<a href="javascript:;" data-tbl="newsletter"  class="btn btn-xs btn-success actinact" data-id="{{$value->id}}" data-value="0">Active</a>
                      @else
                      <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="newsletter" data-id="{{$value->id}}" data-value="1">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <form action="{{ route('newsletter.destroy',$value->id) }}" method="POST" class="delete">                      
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