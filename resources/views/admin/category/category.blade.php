<link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />

<style>
table.treetable td {padding: 10px 10px 10px 0;} 
table.treetable span.indenter {
  display: inline-block;
  margin: 0;
  padding: 0;
  text-align: right;
  user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -o-user-select: none;
  -webkit-user-select: none;
  width: 19px;
}

table.treetable span.indenter a {
  background-position: left center;
  background-repeat: no-repeat;
  display: inline-block;
  text-decoration: none;
  width: 19px;
}
table.treetable tr.collapsed span.indenter a {
background-image: url(../images/toggle-expand-dark.png);
}

table.treetable tr.expanded span.indenter a {
background-image: url(../images/toggle-collapse-dark.png);
}

</style>

<div class="container">
 
<div class="row">
 
    <div class="col-md-6"> 
      <div id="treeview-checkbox-demo">
 			  <label>Category</label>
         <!-- <ul class="subChild_menu">
          	@foreach($categories as $cat)
              <li data-value="{{$cat->id}}">{{$cat->name}}    
               @foreach( fetchCategoryTreeListMain($cat->id) as $sub)
                {!! $sub !!}
               @endforeach
              </li>
              @endforeach 
          </ul>--> 
      </div>
    </div>
  </div>
 
 </div>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script src="{{ asset('admin/dist/js/logger.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/dist/js/jquery.treetable-ajax-persist.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/dist/js/jquery.treetable-3.0.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/dist/js/persist-min.js') }}"></script>
<script>
 /* $('#treeview-checkbox-demo').treeview({
    debug : false,  
    data: [{{ isset($info) ? $info->category_id : '' }}  ],
  })*/
  $("#treeview-checkbox-demo").agikiTreeTable({persist: true, persistStoreName: "files"});
  
  
</script>