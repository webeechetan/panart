@extends('layouts.admin')
@section('title') Exhibiton @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>Manage Exhibiton Gallery</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Create Exhibiton</li></ol>
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
                    <a class="btn btn-info" href="{{route('banner.index')}}"><i class="fa "></i>Manage Banner</a>
                    <a class="btn btn-info" href="{{ route('banner.edit', $id) }}"><i class="fa "></i>Back</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{ showMessage() }}
                <div class="form-group">
                  <form method="post" action="{{url('backend/exhibition/upload_data')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                <label for="cat_name">Exhibition Image</label>
                <div class="input-group control-group increment" >
                  <input type="file" name="filename[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="ex_id" class="form-control" value="{{$id}}">
               <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('banner.index')}}" class="btn btn-danger">Cancel</a>
              </form>
              </div>
            <!-- /.box-body -->
            <br><hr>

   <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
   <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr><th>#</th>
        <th>Picture</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $image)
       <tr><td>{{$image->id}}</td>
           <td> 
              <img src="{{ asset('/images/exhibition/'.$image->filename) }}" style="height:120px; width:200px"/>
            <?php //foreach (json_decode($image->filename)as $picture) { ?>
                <!--  <img src="{{ asset('/images/exhibition/' ) }}" style="height:120px; width:200px"/> -->
                <?php //} ?>
           </td>
           <td  id="parentactive-{{$image->id}}"> 
              @if($image->status==1)<a href="javascript:;" data-tbl="exhibition"  class="btn btn-xs btn-success actinact" data-id="{{$image->id}}" data-value="0">Active</a>
              @else
              <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="exhibition" data-id="{{$image->id}}" data-value="1">Inactive</a>
              @endif
            </td> 
            <td>
              <form action="{{ url('backend/exhibition/delete') }}" method="POST" class="delete">               
              @csrf
             
            <input type="hidden" name="idx" value="{{$image->id}}" />
            <button type="submit" class="btn btn btn-xs btn-info btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>
             </td> 
      </tr>
        @endforeach
    </tbody>
   </table>
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