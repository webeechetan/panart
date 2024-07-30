@extends('layouts.admin')
@section('title') Gallery Update @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Gallery Update</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Update Banner</li></ol>
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
                    @if($info->banner_type=='exhibitions') 
                    <a class="btn btn-info" href="{{url('backend/exhibition/index/'.$info->id)}}"><i class="fa "></i>Exhibition Gallery</a>@endif
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {{ Form::open(array('method' => 'PATCH','route' => ['banner.update',$info->id], 'files' => true )) }}
              
                <div class="form-group">
                  <label for="cat_name">Title</label>                 
                     {!! Form::text('title', $info->title,['placeholder'=>'Title','class'=>'form-control', 'required'=>'required'])!!}
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="cat_name">Gallery Type</label>                 
                        <select name="banner_type" id="banner_type" class="form-control">
                          <option value="">Please Select</option>
                          <option value="banners" @if($info->banner_type=='banners') selected @endif>Banners</option>
                          <option value="exhibitions" @if($info->banner_type=='exhibitions') selected @endif>Exhibitions</option>
                          <option value="videos" @if($info->banner_type=='videos') selected @endif>Videos</option>
                          <option value="artworks" @if($info->banner_type=='artworks') selected @endif>Artworks</option>   
                          <option value="upcoming_exhibitions" @if($info->banner_type=='upcoming_exhibitions') selected @endif>Upcoming Exhibitions</option>                       
                        </select>
                    </div>
                    <div class="col-md-6">
                      <label for="cat_name">Sequence</label>                 
                     {!! Form::text('sequence',$info->sequence,['placeholder'=>'Sequence','class'=>'form-control', 'required'=>'required'])!!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cat_name">Url</label>                 
                     {!! Form::text('url',$info->url,['placeholder'=>'Url','class'=>'form-control', ])!!}
                </div>
              
                <div class="form-group">
                  <label for="cat_name">Description</label>                 
                     {!! Form::textarea('description', $info->description,['placeholder'=>'Description','id'=>'description','class'=>'form-control', 'required'=>'required'])!!}
                </div> 
              
                <div class="form-group">
                  <label for="cat_name">Image</label>
                   {!! Form::input('file','image','' ,['class'=>'form-control title'])!!}
                   @if($info->image!="")
                   <a target="_blank" class="viewfile"  href="{!! asset('images/banner/'.$info->image) !!}"><img src="{!! asset('images/banner/'.$info->image) !!}" height="100" width="100" /></a>
                   @endif
                </div>             
                <div class="form-group">
                  <label for="cat_name">Thumb Image</label>
                    {!! Form::input('file','thumb_image','' ,['class'=>'form-control title'])!!}
                    <a target="_blank" class="viewfile" href="{!! asset('images/banner/thumb_image/'.$info->thumb_image) !!}">View</a>
                </div>
                 <!--<div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="cat_name">Banner Type</label>   
                      <select required="" name="banner_type" id="banner_type" class="form-control">
                      <option value="">Select</option>
                        <option value="category" @if($info->banner_type=='category') selected @endif>Category</option>
                        <option value="product" @if($info->banner_type=='product') selected @endif>Product</option>
                        <option value="package" @if($info->banner_type=='package') selected @endif>Package</option>
                      </select> 
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div id="sku" @if($info->banner_type=='category') style="display: none;" @endif>
                          <div class="col-md-6">
                            <label for="cat_name">Sku</label>   
                            {!! Form::text('psku',$info->psku,['placeholder'=>'Sku','class'=>'form-control', ])!!}
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div> -->
                <!-- <div class="form-group" id="category" @if($info->banner_type!='category') style="display: none;" @endif>
                  
                </div> -->

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
    //    $('#sku').hide(); $('#category').hide();
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
@endsection