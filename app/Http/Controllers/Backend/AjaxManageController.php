<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class AjaxManageController extends Controller
{

  private $tbl = ["cate"=>"categories","cm"=>"cms","prod"=>"product",
  "ptype"=>"producttypes",
  "gall"=>"product_gallery","banne"=>"banners", "package"=>"product",
  "blog"=>"blog","testimonial"=>"testimonial","newsletter"=>"newsletter","exhibition"=>"exhibitions"];

 
  public function statusupdate(Request $request)
  {
    
    $active  =  ($this->tbl[$request->tbl] == 'reversal_master') ? 'Done' : 'Active';
    $Inactive  =  ($this->tbl[$request->tbl] == 'reversal_master') ? 'Not Done' : 'Inactive';
    
    if($request->status == 1){
    	DB::table($this->tbl[$request->tbl])->where('id', $request->pid)->update(['status' => $request->status]);
      $data['html'] = '<a href="javascript:;" data-tbl="'.$request->tbl.'"   class="btn btn-xs btn-success actinact" data-id="'.$request->pid.'" data-value="0">'.$active.'</a>';
    } else if($request->status== 0){    
      DB::table($this->tbl[$request->tbl])->where('id', $request->pid)->update(['status' => $request->status]);        
      $data['html'] = '<a href="javascript:;" data-tbl="'.$request->tbl.'"  class="btn btn-xs btn-danger actinact" data-id="'.$request->pid.'" data-value="1">'.$Inactive.' </a>';
    }

    echo json_encode($data);

  }


}
