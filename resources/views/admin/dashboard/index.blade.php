@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
 
        
           

  


 <section class="content"">
        <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                {{ showMessage() }}
          <div class="work_h">
            <h2></h2>
            <div class="table_mn">
              <div style="width:100%; position: relative; background-color: #fff">
                <canvas id="canvas"></canvas>
              </div>
                          
            </div>
          </div>
                </div>
     </div>
   </section>


 



      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

 
  </script>
@endsection