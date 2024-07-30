@extends('layouts.admin')
@section('title') Manage Category @endsection
@section('main-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>


body {
    font-family: Arial;
}

ul.tree li {
    list-style-type: none;
    position: relative;
}
.TreeDiagram__name {
    font-size: 18px;
    color: #222;
    display: flex;
    justify-content: space-between;
    padding: 12px 20px 15px 30px;
    font-weight: 600;
}
ul.tree li ul {
    display: none;
}

ul.tree li.open > ul {
    display: block;
}

ul.tree li a {
    color: black;
    text-decoration: none;
}
ul.tree li.First_LIA a.CategoryName {
    position: relative;
    padding-left: 22px;
}
.CategoryName:before {
    font-size: 22px;
    display: block;
    position: absolute;
    left: 0;
    top: -1px;
    color: #000;
    content: '+';
    line-height: 22px;
}
.First_LIA_Add .CategoryName:before{
  content: '-';
}



ul.second_child,ul.third_child{padding:0px;}
.TreeDiagram_DIv ul {
    padding: 0;
    margin: 0;
}
.TreeDiagram_DIv ul li {
    padding:0;
    margin-bottom: 0;
}

.TreeDiagram_DIv ul.tree {
    padding: 0 20px;
    background: #ccc;
}
ul.tree li.First_LIA {
    color: #0b0b0b;
    text-decoration: none;
    width: 100%;
    padding: 7px 0px 7px 0px;
    box-sizing: border-box;
    position: relative;
    background: #ccc;
    margin-bottom: 1px;
    border-bottom: 1px solid #000;
}
ul.third_child li {
    display: flex;
    justify-content: space-between;
}
ul.third_child {
    background: #a5a5a5;
    padding: 20px 15px 20px 70px;
}
ul.second_child li a.First_LIA:before {
    left: 25px;
}
ul.second_child li a.First_LIA {
    padding-left: 45px;
}
.TreeDiagram_DIv ul {
    padding: 0;
    margin: 0;
    width: 100%;
}
.First_LIA_bx {
    position: relative;
    overflow: hidden;
    font-size: 15px;
    line-height: 32px;
    width: 100%;
}
.First_LIA_bx .actinact {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    display: block;
    padding: 2px 15px 2px 15px;
    font-size: 14px;
    line-height: 22px;
}
ul.tree li.First_LIA:last-child {
    border-bottom: 0;
}
.First_LIA_bx .editcls {
    float: right;
    margin: 3px 0 0 0;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Category</h1>      
          <ol class="breadcrumb"><li><a href="{{ route('admin-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li><li class="active">Category</li></ol>
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
                    
                    <a class="btn btn-success addcls" href="{{route('category.create')}}"><i class="fa fa-plus"></i> Add New</a>    
                     
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              {{ showMessage() }}

              {{-- @include('admin.category.category') --}}
              <div class="">
                 <div class="TreeDiagram_DIv">
                   <div class="TreeDiagram__name">
                      <div class="">Category Name</div>
                      <div class="">Status</div>
                      <div class="">Action</div>
                    </div>
                      <ul class="tree">
                        @foreach($categories as $category)
                        <li class="First_LIA">
                            <div class="First_LIA_bx">
                              <a href="javascript:;" class="CategoryName">{{$category->name}}</a>
                              <span id="parentactive-{{$category->id}}">
                                @if($category->status==1)<a href="javascript:;" data-tbl="cate"  class="btn btn-xs btn-success actinact" data-id="{{$category->id}}" data-value="0"  >Active</a>
                              @else
                                <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="cate" data-id="{{$category->id}}" data-value="1">Inactive</a>
                              @endif
                            </span>
                              <a href="{{ route('category.edit', $category->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit"></i></a>
                            </div>
                          @if(count($category->childs))
                                @include('admin.category.manageChild',['childs' => $category->childs,'class'=>'second_child'])
                            @endif
                          </li>
                        @endforeach
                      </ul>
                       
                 </div>
              </div>
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
  $(document).ready(function(){
//   var tree = document.querySelectorAll('ul.tree a:not(:last-child)');
// //  console.log(tree.length)
// for(var i = 0; i < tree.length; i++){
//     tree[i].addEventListener('click', function(e) {
//         var parent = e.target.parentElement;
//         var classList = parent.classList;
//         if(classList.contains("open")) {
//             classList.remove('open');
//             var opensubs = parent.querySelectorAll(':scope .open');
//             for(var i = 0; i < opensubs.length; i++){
//                 opensubs[i].classList.remove('open');
//             }
//         } else {
//             classList.add('open');
//         }
//     });
// }

$('.CategoryName').click(function(){
  $(this).parent().siblings('ul').slideToggle();
  $(this).parent().toggleClass('First_LIA_Add');
})
})
</script>  
<script>
var storClass,storClass1;
  $(document).ready(function(){
	/*  
	  $('.common').each(function(el,ind){
		  console.log(el, $('.common').eq(el).attr('rel'))
		  storClass = $('.common').eq(el).attr('class');
		  storClass1 = $('.common').eq(el).attr('span');
		
		  if(storClass == storClass1){
			  console.log($(this))	  
		  }
	  })
	 */ 
	var dataArray = new Array();
    $('.common').each(function(el,ind){
      var dataLayer = $('.common').eq(el).attr('rel');
      var dataLayer1 = $('.common').eq(el).attr('rel');
	 // console.log(dataLayer,$('.common').eq(el).attr('rel'))
	  $('.common').eq(el).parent('tr').addClass(dataLayer)
         
    });
var classes = $('.table-bordered.table-striped tbody tr').map(function() {
    return $(this).attr('class');
});

// Filter only unique ones
var uniqueClasses = $.unique(classes);

// Now group them
$(uniqueClasses).each(function(i, v)
{
   // console.log(i,v)
    $('.'+v).wrapAll('<tr class ="parneCommmon common-'+v+'"></tr>');
});
	
$('.parneCommmon').hide()	  
	  $('.table-bordered.table-striped tbody tr:not([class])').each(function(el,ind){
		  //console.log($('.table-bordered.table-striped tbody tr:not([class])').eq(el).find('td').append('<div class="click" style="float:right">asdasdsa</div>'))
		  
	  })
	  
	  $(document).on('click',function(){
		//var $stor = $(this).closest('tr').find('.common').attr('class').match(/common-\d+/);
		  //console.log($(this).closest('tr').find('.common').attr('class').match(/common-\d+/))
		  
		  //$(this).after($(this).closest('tr').find('.common').attr('class').match(/common-\d+/))
	  })
	  
	  
  })

</script>
  
  
  
@endsection