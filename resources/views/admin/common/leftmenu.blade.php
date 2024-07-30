
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
     <!--  <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->first_name}}</p>
        </div>
      </div> -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header"></li>
        <li class="active"><a href="{{ route('admin-dashboard') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Dashboard</span></a></li>
         
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-circle-o text-red"></i>
            <span>Manage Gallery </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="{{ url('/backend/banner') }}"><i class="fa fa-circle-o text-aqua"></i> <span>All Gallery</span></a></li>
           <li><a href="{{ url('/backend/banner/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Create Gallery</span></a></li>
           </ul>
        </li> 
      
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-circle-o text-red"></i>
          <span>Manage CMS Pages </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/backend/cms') }}"><i class="fa fa-circle-o text-aqua"></i> <span>All CMS Pages</span></a></li>
          <li><a href="{{ url('/backend/cms/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Create  Page</span></a></li>
         </ul>
      </li>
      
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-circle-o text-red"></i>
          <span>Manage Category </span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/backend/category') }}"><i class="fa fa-circle-o text-aqua"></i>
           <span>All Category</span></a></li>
          <li><a href="{{ url('/backend/category/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Create Category</span></a></li>
        </ul>        
      </li>
       
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-circle-o text-red"></i>
          <span>Manage Products </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/backend/product') }}"><i class="fa fa-circle-o text-aqua"></i> <span>All Products</span></a></li>
          <li><a href="{{ url('/backend/product/create') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Create  Product</span></a></li>
        </ul>
      </li> 
      
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-circle-o text-red"></i>
          <span>Manage Enquiry</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          <li><a href="{{ url('/backend/contactus') }}"><i class="fa fa-circle-o text-aqua"></i>
           <span>Contact Us</span></a></li> 
           <li><a href="{{url('/backend/newsletter')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Newsletter</span></a></li>
        </ul>
      </li> 
       
      @if (Auth::check())
      <!-- <li class="treeview ">
        <a href="#">
          <i class="fa fa-circle-o text-red"></i>
          <span>Manage Access </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/backend/permissions')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Permissions</span></a></li>  
          <li><a href="{{ url('/backend/roles') }}"><i class="fa fa-circle-o text-aqua"></i> <span> Roles</span></a></li>
          <li><a href="{{ url('/backend/users')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Users</span></a></li>
        </ul>
      </li> -->
    @endif
     
	
    </section>
    <!-- /.sidebar -->
  </aside>