@extends('layouts.admin')
@section('title') Gallery Create @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Manage Gallery Create</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Create Banner</li></ol>
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
                    <a class="btn btn-info" href="{{route('banner.index')}}"><i class="fa "></i>Manage Gallery</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {!! Form::open(['route' => 'banner.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}

            

                <div class="form-group">
                  <label for="cat_name">Title</label>                 
                     {!! Form::text('title', '',['placeholder'=>'Title','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="cat_name">Gallery Type</label>                 
                        <select name="banner_type" id="banner_type" class="form-control" required>
                          <option value="">Please Select</option>
                          <option value="banners">Banners</option>
                          <option value="exhibitions">Exhibitions</option>
                          <option value="videos">Videos</option>
                          <option value="artworks">Artworks</option>
                          <option value="upcoming_exhibitions">Upcoming Exhibitions</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                      <label for="cat_name">Sequence</label>  
                      {!! Form::text('sequence','0',['placeholder'=>'Sequence','class'=>'form-control', 'required'=>'required'])!!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cat_name">Url</label>                 
                     {!! Form::text('url','',['placeholder'=>'Url','class'=>'form-control', ])!!}
                </div>
              
                <div class="form-group">
                  <label for="cat_name">Description</label>                 
                  {!! Form::textarea('description', '',['placeholder'=>'Description','id'=>'description','class'=>'form-control', 'required'=>'required'])!!}
                </div>            
              
                <div class="form-group">
                    <label for="cat_name">Image</label>
                     {!! Form::input('file','image','' ,['class'=>'form-control title'])!!}
                </div>

                <!--<div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="cat_name">Banner Type</label>   
                      <select required="" name="banner_type" id="banner_type" class="form-control">
                      <option value="">Select</option>
                        <option value="category">Category</option>

                         option value="product">Product</option>
                        <option value="package">Package</option>
                      </select> 
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div id="sku" style="display: none;">
                          <div class="col-md-6">
                            <label for="cat_name">Sku</label>   
                            {!! Form::text('psku','',['placeholder'=>'Sku','class'=>'form-control', ])!!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  -->
                <!-- <div class="form-group" id="category" style="display: none;">
                </div> -->

              </div>

              <div class="form-group">
                <label for="cat_name">Thumb Image</label>
                {!! Form::input('file','thumb_image','' ,['class'=>'form-control title'])!!}
              </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('banner.index')}}" class="btn btn-danger">Cancel</a>
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
  <script type="text/javascript">
    // $('#banner_type').change(function(){      
    //     $('#sku').hide();
    //     $('#category').hide();
    //     if(this.value == 'package'){
    //       $('#sku' ).show();
    //     }
    //     if(this.value =='product'){
    //       $('#sku').show();
    //     }
    //     if(this.value =='category'){
    //       $('#'+ this.value).show();
    //     }
    // });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endsection