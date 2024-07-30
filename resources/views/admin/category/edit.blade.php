@extends('layouts.admin')
@section('title') Category Update @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Category Update</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Update Category</li></ol>
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
                    <a class="btn btn-info" href="{{route('category.index')}}"><i class="fa "></i>Manage Category</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {{ Form::open(array('method' => 'PATCH','route' => ['category.update',$categories->id], 'files' => true )) }}
                <div class="form-group">
                  <label for="cat_name">Select Parent Category</label> 
                  <select id="title" class="form-control" name="parent_id">
                    <option value="">Select Category</option>
                    @foreach($parentCategory as $category)
                    <option value="{{$category['id']}}" @if($category['id']==$categories->parent_id) {{ "selected" }} @endif>{{  $category['name'] }}</option>
                     @endforeach 
                  </select>                 
                  {{-- {!! Form::select('parent_id', $parentCategory, $categories->parent_id, ['id'=>'title','class'=>'form-control','placeholder'=>'Please Select'])!!} --}}
                </div>

                <div class="form-group">
                  <label for="cat_name">Category Name</label>                 
                    {!! Form::text('name', $categories->name,['placeholder'=>'Category Name','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                
                <!-- <div class="form-group">
                  <label for="cat_name">Category Slug</label>                 
                    {!! Form::text('slug', $categories->slug,['id'=>'slug', 'placeholder'=>'Slug','class'=>'form-control'])!!}
                </div> -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="cat_name">Category Slug</label>                 
                        {!! Form::text('slug', $categories->slug,['id'=>'slug', 'placeholder'=>'Slug','class'=>'form-control', 'required'=>'required'])!!}
                    </div> 
                    @if(!$categories->parent_id)
                    <div class="col-md-4">
                      <label for="cat_name">Category Sequence</label>                 
                        {!! Form::text('sequence', $categories->sequence,['id'=>'sequence', 'placeholder'=>'Category Sequence','class'=>'form-control'])!!}
                    </div> 
                    @endif
                    <div class="col-md-4">
                      <label for="is_featured">Is Featured</label><br/>
                      <select name="is_featured" id="is_featured" class="form-control">
                          <option value="">Please Select</option>
                          <option value="1" @if($categories->is_featured==1) selected @endif>Yes</option>
                          <option value="0" @if($categories->is_featured==0) selected @endif>No</option>
                        </select>
                    </div> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="cat_name">Category Description</label>                 
                     {!! Form::textarea('description', $categories->description,['placeholder'=>'Description','id'=>'description','class'=>'form-control', 'required'=>'required'])!!}
                </div>
               
              
                   <div class="form-group">
                      <label for="cat_name">Category Image</label>
                       {!! Form::input('file','image','' ,['class'=>'form-control title'])!!}
                       @if(!empty($categories->image))
                       <a target="_blank" class="viewfile"  href="{!! asset('images/category/'.$categories->image) !!}">View</a>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="cat_name">Thumb Image</label>
                       {!! Form::input('file','thumb_image','' ,['class'=>'form-control title'])!!}
                       @if(!empty($categories->thumb_image))
                       <a target="_blank" class="viewfile"  href="{!! asset('images/category/'.$categories->thumb_image) !!}">View</a>
                       @endif
                    </div>
                     <div class="form-group">
                          <label for="cat_name">Meta Title</label>                 
                             {!! Form::text('meta_title', $categories->meta_title,['placeholder'=>'Meta Title','class'=>'form-control'])!!}
                    </div>
                   <!--  <div class="form-group">
                          <label for="cat_name">Meta Keyword</label>                 
                             {!! Form::text('meta_keyword', '',['placeholder'=>'Meta Keyword','class'=>'form-control'])!!}
                    </div> -->
                    <div class="form-group">
                      <label for="cat_name">Meta Description</label>                 
                         {!! Form::textarea('meta_description', $categories->meta_description,['placeholder'=>'Meta Description','id'=>'meta_description','class'=>'form-control'])!!}
                    </div> 
              <!--    <div class="form-group">
                      <label for="cat_name">Thumb Image</label>
                       {!! Form::input('file','thumb_image','' ,['class'=>'form-control title'])!!}
                        <a target="_blank" class="viewfile" href="{!! asset('images/category/'.$categories->thumb_image) !!}">View</a>
                    </div> -->



                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
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
    // CKEDITOR.replace('footer_description', {
    //     filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
    // CKEDITOR.replace('footer_short_description', {
    //     filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
    CKEDITOR.config.allowedContent = true;
  </script>
@endsection