@extends('layouts.admin')
@section('title') Product Create @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Manage Product</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Create Product</li></ol>
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
                    <a class="btn btn-info" href="{{route('product.index')}}"><i class="fa "></i>Manage Product</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
          
              {!! Form::open(['route' => 'product.store','role' => 'form', 'class'=>'department-form','id'=>'answerfrm', 'files' => true ]) !!}

              <div role="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">General</a></li>
                    <!-- <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Custom Price</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Misc</a></li> -->
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Category</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Meta Information</a></li>
                </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="tab1">

                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                             <label for="cat_name">Product Name</label>                 
                           {!! Form::text('title', '',['placeholder'=>'Product Name','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                          <div class="col-md-3">
                            <label for="cat_name">Product Slug</label>                 
                           {!! Form::text('slug', '',['id'=>'slug', 'placeholder'=>'Slug','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                          <div class="col-md-3">
                            <label for="cat_name">Product Sequence</label>                 
                           {!! Form::text('sequence', '',['id'=>'sequence', 'placeholder'=>'Sequence','class'=>'form-control', 'required'=>'required'])!!}
                          </div>
                     </div>
                       
                    </div>

                    <div class="form-group">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="cat_name">Price </label>                 
                            {!! Form::text('price','0.00',['placeholder'=>'Price','id'=>'price','class'=>'form-control','required'=>'required'])!!} 
                        </div>
                      </div>
                    </div>
                      
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="cat_name">Product SKU</label>                 
                           {!! Form::text('sku', '',['placeholder'=>'Sku','class'=>'form-control', 'required'=>'required'])!!}
                        </div> 
                        <!-- div class="col-md-2">
                          <label for="cat_name">Product Type</label>   
                            <select required="required" name="visibility" id="visibility" class="form-control">
                              <option value="">Please Select</option>
                              <option value="1">Visible</option>
                              <option value="2">Not Visible</option>
                            </select>
                        </div 
                        <div class="col-md-2">
                          <label for="cat_name">Product Type</label>
                          <select name="product_type" id="product_type" class="form-control">
                              <option value="">Please Select</option>
                              {{-- @foreach($producttype as $stick) 
                                <option value="{{$stick->id}}"><b>{{$stick->name}}</b></option>
                              @endforeach --}}
                          </select>
                        </div>-->
                        <div class="col-md-2">
                          <label for="is_featured">Is Featured</label><br/>
                          <select name="is_featured" id="is_featured" class="form-control">
                              <option value="">Please Select</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                        </div> 
                        <div class="col-md-2">
                          <label for="cat_name">Related Product (comma separate sku)</label>
                          {!! Form::text('related_product', '',['placeholder'=>'SKU','class'=>'form-control' ])!!}
                          </select>
                        </div>               
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="cat_name">Product Short Description</label>                 
                           {!! Form::textarea('short_description', '',['placeholder'=>'Short Description','id'=>'short_description','class'=>'form-control', 'cols'=>'10', 'rows'=>'5', 'required'=>'required'])!!}
                    </div>               
                    
                    <div class="form-group">
                        <label for="cat_name">Product Description</label>                 
                           {!! Form::textarea('description', '',['placeholder'=>'Description','id'=>'description','class'=>'form-control', 'required'=>'required'])!!}
                    </div>

                    <div class="form-group">
                      <label for="cat_name">Image</label>
                       {!! Form::input('file','image','' ,['class'=>'form-control title','required'=>'required'])!!}                  
                    </div>

                    <div class="form-group">
                      <label for="cat_name">Thumb Image</label>
                       {!! Form::input('file','thumb_image','' ,['class'=>'form-control title','required'=>'required'])!!}                  
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="tab2">
                    @include('admin.product.category')
                  </div>
                  <div role="tabpanel" class="tab-pane" id="tab3">
                    <div class="form-group">
                          <label for="cat_name">Meta Title</label>                 
                             {!! Form::text('meta_title', '',['placeholder'=>'Meta Title','class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                          <label for="cat_name">Meta Keyword</label>                 
                             {!! Form::text('meta_keyword', '',['placeholder'=>'Meta Keyword','class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      <label for="cat_name">Meta Description</label>                 
                         {!! Form::textarea('meta_description', '',['placeholder'=>'Meta Description','id'=>'meta_description','class'=>'form-control'])!!}
                    </div>
                  </div>          
              </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
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
  <script>CKEDITOR.replace('short_description');</script>
  <script>CKEDITOR.replace('description');</script>
  <!-- <script>CKEDITOR.replace('benefits');</script> -->
@endsection