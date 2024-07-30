@extends('layouts.admin')
@section('title') Product Gallery Create @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Manage Product Gallery</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Create Product Gallery</li></ol>
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
                    <a class="btn btn-info" href="{{ route('product-gallery', $id) }}"><i class="fa "></i>Manage Product Gallery</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {!! Form::open(['route' => 'gallery_product.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}
              {!! Form::hidden('product_id', $id)!!}

         

                <div class="form-group">
                  <label for="cat_name">Title</label>
                 
                     {!! Form::text('title', '',['placeholder'=>'Product Name','class'=>'form-control', 'required'=>'required'])!!}
                </div>


                   <div class="form-group">
                      <label for="cat_name">Image</label>
                       {!! Form::input('file','image','' ,['class'=>'form-control title','required'=>'required'])!!}
                      
                    </div>


                    <div class="form-group">
                      <label for="cat_name">Thumb Image</label>
                       {!! Form::input('file','thumb_image','' ,['class'=>'form-control title','required'=>'required'])!!}
                    
                    </div>  

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('product-gallery', $id) }}" class="btn btn-danger">Cancel</a>
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