@extends('layouts.admin')
@section('title') Product Update @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Product Update</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Update Product</li></ol>
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
                      <a class="btn btn-info" href="{{ route('product-gallery', $info->product_id) }}"><i class="fa "></i>Manage Product Gallery</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {{ Form::open(array('method' => 'PATCH','route' => ['gallery_product.update',$info->id], 'files' => true )) }}
                   <div class="form-group">
                  <label for="cat_name">Title</label>
                 
                     {!! Form::text('title', $info->title,['placeholder'=>'Product Name','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                 
                     <div class="form-group">
                      <label for="cat_name">Image</label>
                       {!! Form::input('file','image','' ,['class'=>'form-control title'])!!}
                       @if($info->image!="")
                       <a target="_blank" class="viewfile"  href="{!! asset('images/products/'.$info->image) !!}"><img src="{!! asset('images/products/'.$info->image) !!}" height="100" width="100" /></a>
                       @endif
                    </div>


                        <div class="form-group">
                      <label for="cat_name">Thumb Image</label>
                       {!! Form::input('file','thumb_image','' ,['class'=>'form-control title'])!!}
                       @if($info->thumb_image!="")
                        <a target="_blank" class="viewfile"  href="{!! asset('images/products/thumb/'.$info->thumb_image) !!}"><img src="{!! asset('images/products/thumb/'.$info->thumb_image) !!}" height="100" width="100" /></a>
                       @endif
                    </div>

              
              

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('product-gallery', $info->product_id) }}" class="btn btn-danger">Cancel</a>
              </form>
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