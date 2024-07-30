<?php

function showMessage() {
	if (Session::has('errors')) {

		$error = Session::get('errors')->First();
		echo "<div class='alert alert-danger alert-dismissable'>
                <i class='fa fa-ban'></i>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <b>$error</b>
            </div>";

	} 
	elseif (Session::has('success')) { 

		$success = Session::get('success');
		echo "<div class='alert alert-success alert-dismissable'>
                <i class='fa fa-check'></i>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <b>$success</b>
            </div>";
	}
}

if(!function_exists('get_subcategories')){
    function get_subcategories($id)
    {
        $data = DB::table('categories')->where('parent_id',$id)->get();
        return $data; 
    }
}

if(!function_exists('fetchCategoryTreeList')){
  function fetchCategoryTreeList($parent = 0, $user_tree_array = ''){
    if (!is_array($user_tree_array))
    $user_tree_array = array();
 
    $data = DB::table('categories')->where('parent_id',$parent)->get();
    if(!$data->isEmpty()){
      $user_tree_array[] = '<ul class="vjjj">';
      foreach($data as $row){
        $user_tree_array[] = "<li class='child' data-value='".$row->id."'>". $row->name;//."</li>";
        $user_tree_array = fetchCategoryTreeList($row->id, $user_tree_array);
        $user_tree_array[]="</li>";
      }
      $user_tree_array[] = "</ul>";
    }
    return $user_tree_array;
  }
}

if(!function_exists('fetchCategoryTreeListMain')){
  function fetchCategoryTreeListMain($store_id,$parent = NULL, $user_tree_array = ''){
    if (!is_array($user_tree_array))
    $user_tree_array = array();
    $items = DB::table('categories')->select('id','parent_id','store_id','name','slug','image','thumb_image')->where(["store_id"=>$store_id,"status"=>"1"])->orderByRaw('ISNULL(sequence), sequence ASC')->get();
    $childs = array();
    foreach($items as &$item) $childs[$item->parent_id][] = &$item;
    foreach($items as &$item){ 
      if(isset($childs[$item->id])){
        $item->childs = $childs[$item->id];
      }else{
        $item->childs=array();
      }
    }
    $category=array();
    foreach($childs as $child){
      $category=$child;break;
    }  

    $tree = $category;   
    return $tree;
  }
}
/*get state details  on the base of state id*/
function getState($id){
  $state =  DB::Table('states')->where('id',$id)->first();

  return $state;
}
function getParentCategory( ){
  $categories = DB::Table('categories')->where(["parent_id"=>NULL,"is_featured"=>1])->get();
  return $categories;
}
/*get city details  on the base of city id*/
function getCity($id){
  $city = DB::Table('city_master')->where('id',$id)->first();
  return $city;
}
function getUser($id){
	//echo $id; exit;
  $users = DB::Table('users')->where('id',$id)->first();
  //dd($users);
  return $users;
}

function getRemoveSpace($string){
  if($string)
    $string= strtolower(preg_replace("/[^a-zA-Z]+/", "", $string));

  return $string;
}

if(!function_exists('fetchGallery')){
  function fetchGallery($gallerytype= ''){    
    $data = DB::table('banners')->where(['banner_type'=>$gallerytype,'status'=>1])->orderBy('sequence','ASC')->get();    
    return $data;
  }
}

if(!function_exists('getExhibitionImage')){
  function getExhibitionImage($id){    
    $data = DB::table('exhibitions')->where(['ex_id'=>$id,'status'=>1])->orderBy('id','ASC')->get();    
    return $data;
  }
}

if(!function_exists('fetchCategorySubcategory')){
  function fetchCategorySubcategory($catid){  
  
    $data = DB::table('categories')->whereIN('id', explode(',',$catid))->where(['status'=>1])->get();  
    $category =array();
    foreach($data as $child){
      if($child->parent_id>0)
        $category[]=$child->slug; 
      } 
    return $category;
  }
}

if(!function_exists('limit_words')){
  function limit_words($string, $word_limit)
  {
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
  }
}

