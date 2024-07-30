@extends('layouts.admin')
@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{$data['page_tile']}}</h1>      
          {!!$data['breadcrumb']!!}
    </section>

 <section class="content">
  {!! showMessage() !!}
         <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
             
                {!! Form::open(['route' => 'change-password-post','role' => 'form', 'class'=>'department-form','files' => true,'enctype'=>"multipart/form-data"]) !!}
                <div class="form-group">
              

               <div class="form-group">
                  <label for="cat_name">Password</label>
                    {!! Form::input('password','password','' ,['class'=>'form-control title','placeholder'=>'Password','required'=>'required'])!!}
                </div>


                     <div class="form-group">
                  <label for="cat_name">Confirm Password</label>
                    {!! Form::input('password','confirm_password','' ,['class'=>'form-control title','placeholder'=>'Confirm Password','required'=>'required'])!!}
                </div>

               

             
                <button type="submit" id="assigntobtn" class="btn btn-primary">Submit</button>
                <a href="{{url('backend/dashboard')}}" class="btn btn-danger">Cancel</a>
               </form>

            </div>
          </div>
        </div>


      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">



@endsection