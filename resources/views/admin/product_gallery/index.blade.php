@extends('layouts.admin')
@section('title') Manage Products Gallery @endsection
@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products Gallery</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Products Gallery</li></ol>
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
                    
                    <a class="btn btn-success addcls" href="{{route('product-gallery-create',$id)}}"><i class="fa fa-plus"></i> Add New</a>  
                    <a class="btn btn-success addcls" href="{{ url('/backend/product') }}">Back</a>    
                   
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
                  <th>S.no</th>
                   <th>Product Name</th>
                    <th>Title</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($info as $value)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                 
                     <td>{{$value->product->title}}</td>
                    
                      <td>{{$value->title}}</td>
                   
                       <td  id="parentactive-{{$value->id}}"> 
                        @if($value->status==1)<a href="javascript:;" data-tbl="gall"  class="btn btn-xs btn-success actinact" data-id="{{$value->id}}" data-value="0">Active</a>
                        @else
                        <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="gall" data-id="{{$value->id}}" data-value="1">Inactive</a>
                        @endif
                      </td>  
 
                    <td>
                      <a href="{{ route('gallery_product.edit', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit"></i></a>



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

@endsection