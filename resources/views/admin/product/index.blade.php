@extends('layouts.admin')
@section('title') Manage Products @endsection
@section('main-content')
<style>
.btn-danger{padding:6px 12px;}
.lt_serach{width: 100%;overflow: hidden;max-width: 400px;margin-bottom: 10px;}
.lt_serach input.first{    float: left;max-width: 150px;margin-right: 10px;}
.lt_serach input.second{    max-width: 150px;float: right}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Products</li></ol>
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
                     
                    <a class="btn btn-success addcls" href="{{route('product.create')}}"><i class="fa fa-plus"></i> Add New</a>    
                     
                  </div>
                  <div class="pull-left">
                    <div class="lt_serach" style="">
                    
                    {!! Form::open(['route' => 'product.index','method'=>'GET', 'role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}
                    {!! Form::text('product', \Request::get('product'),['placeholder'=>'Product Name','class'=>'form-control first'])!!} 
                    {!! Form::text('sku', \Request::get('sku'),['placeholder'=>'Product Sku','class'=>'form-control second'])!!}    
                    </div>

                    <button type="submit" name="submitBTN" class="btn btn-primary">Search</button>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"  title="Reset">Reset</a>  
                    </form>  
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
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Sku</th> 
                  <th>Sequence</th>
                  
                  <th>Images Gallery</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($info as $value)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>@if(isset($value->category->name)){{$value->category->name}}@endif</td>
                     <td>{{$value->title}}</td>
                     <td>{{$value->sku}}</td> 
                     <td>{{$value->sequence}}</td>
                     <td> <a target="_blank" href="{{ route('product-gallery', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Add Gallery">Create Gallery</a>
                     </td>
                    
            
                      <!-- <td>  {{--<a target="_blank" href="{{ route('product-gallery', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Add Gallery">Create Gallery</a>
                        <a target="_blank" href="{{ route('product-faq', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Add Faq">Create Faq</a>
                        <a href="{{ route('product-copy', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Copy Faq">Copy Faq</a> 
                        <a target="_blank" href="{{ route('product-variant',$value->id)}}" class="btn btn-xs btn-info editcls"  title="Add Variant">Variant</a>
                        <a target="_blank" href="{{ route('product-recommend',$value->id)}}" class="btn btn-xs btn-info editcls"  title="Add Faq">Recommend Product --}}</a>
                      </td> -->

                      <td id="parentactive-{{$value->id}}">
                        @if($value->status==1)<a href="javascript:;" data-tbl="prod"  class="btn btn-xs btn-success actinact" data-id="{{$value->id}}" data-value="0">Active</a>
                        @else
                        <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="prod" data-id="{{$value->id}}" data-value="1">Inactive</a>
                        @endif
                      </td>  
 
                    <td>
                      <a href="{{ route('product.edit', $value->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit"></i></a>



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