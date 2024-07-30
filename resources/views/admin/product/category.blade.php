<link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />

<div class="container">
 
<div class="row">
 
    <div class="col-md-6"> 
      <div id="treeview-checkbox-demo">
 			  <label>Category</label>
          <ul class="subChild_menu"> 
          	@foreach($category as $cat)
              <li data-value="{{$cat->id}}">{{$cat->name}}    
               @foreach( fetchCategoryTreeList($cat->id) as $sub)
                 {!! $sub !!}
               @endforeach
              </li>
              @endforeach 
          </ul> 
      </div>
    </div>
  </div>
 
 </div>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script src="{{ asset('admin/dist/js/logger.js') }}"></script>
<script src="{{ asset('admin/dist/js/treeview.js') }}"></script>
<script>

    $('#treeview-checkbox-demo').treeview({
       debug : true,
  
  data: [{{ isset($info) ? $info->category_id : '' }}  ],
})
</script>