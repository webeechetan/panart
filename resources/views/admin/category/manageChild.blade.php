<ul class="{{$class}} test">
 
  @foreach($childs as $child)
   <li class="First_LIA">
    <div class="First_LIA_bx">
      <a href="javascript:;" @if(count($child->childs)) class="CategoryName" @endif>{{ $child->name }}</a>
        <span id="parentactive-{{$child->id}}">@if($child->status==1)
          <a href="javascript:;" data-tbl="cate"  class="btn btn-xs btn-success actinact" data-id="{{$child->id}}" data-value="0">Active</a>
          @else
            <a href="javascript:;" class="btn btn-xs btn-danger actinact" data-tbl="cate" data-id="{{$child->id}}" data-value="1">Inactive</a>
          @endif</span>

            <span><a href="{{ route('category.edit', $child->id) }}" class="btn btn-xs btn-info editcls"  title="Click here to edit"> <i class="fa fa-edit"></i></a></span>
      </div>
      
    @if(count($child->childs))
        @include('admin.category.manageChild',['childs' => $child->childs,'class'=>'third_child'])
    @endif
  </li>
@endforeach
</ul>