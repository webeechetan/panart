@extends('layouts.admin')
@section('title') Manage CMS @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Manage Page Create</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Create Cms</li></ol>
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
                    <a class="btn btn-info" href="{{route('cms.index')}}"><i class="fa "></i>Manage CMS</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {!! Form::open(['route' => 'cms.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}

            

                <div class="form-group">
                  <label for="cat_name">Page Name</label>
                 
                     {!! Form::text('name', '',['placeholder'=>'Page Name','class'=>'form-control', 'required'=>'required'])!!}
                </div>


                  <div class="form-group">
                  <label for="cat_name">Slug</label>
                 
                     {!! Form::text('slug', '',['id'=>'slug', 'placeholder'=>'Slug','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                

                <div class="form-group">
                  <label for="cat_name">Short Description</label>                 
                     {!! Form::textarea('short_description', '',['placeholder'=>'Short Description','id'=>'short_description','class'=>'form-control', 'required'=>'required'])!!}
                </div>
              
                <div class="form-group">
                  <label for="cat_name">Description</label>
                 
                     {!! Form::textarea('description', '',['placeholder'=>'Description','id'=>'description','class'=>'form-control', 'required'=>'required'])!!}
                </div> 
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="cat_name">Image </label>
                       {!! Form::input('file','image','' ,['class'=>'form-control title'])!!} 
                    </div>                    
                  </div>
                </div> 
                <div class="form-group">
                      <label for="cat_name">Meta Title</label>                 
                          {!! Form::text('meta_title', '',['placeholder'=>'Meta Title','class'=>'form-control'])!!}
                </div> 
                <div class="form-group">
                  <label for="cat_name">Meta Description</label>                 
                      {!! Form::textarea('meta_description', '',['placeholder'=>'Meta Description','id'=>'meta_description','class'=>'form-control'])!!}
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('cms.index')}}" class="btn btn-danger">Cancel</a>
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
  <script>
    //CKEDITOR.replace('description');
    //CKEDITOR.replace('short_description');
     CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
     CKEDITOR.replace('short_description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.config.allowedContent = true;
  </script>
@endsection