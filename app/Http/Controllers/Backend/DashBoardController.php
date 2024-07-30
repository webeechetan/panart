<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use DB;

class DashBoardController extends Controller
{
	
    public function __construct(){
    }

    public function index(){
    	    //	if(!Entrust::can($module)) 
    		//	 return redirect(route('agreement-custom'))->withErrors("Somethings gone wrong.");     
        return view('admin.dashboard.index');     
    }
    
}
