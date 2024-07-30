<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\ContactUS;
//use Entrust;
use Auth;
use Illuminate\Support\Str;
use Session;
use DB;

class ManageNewsletterController extends Controller
{
    public function __construct(){
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Newsletter $info)
    {
    	        $info = $info->order()->paginate(20);    
        return view('admin.newsletter.index',compact('info'));
    }

    public function needhelp()
    {        
        if(!Entrust::can("manage-newsletter")) 
        return redirect(route('admin-dashboard'))->withErrors("Permission denied.");      

        $info = DB::table('help_enquiry')->orderBy('created_at', 'desc')->paginate(20);    
        return view('admin.newsletter.needhelp',compact('info'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// if(!Entrust::can("manage-newsletter")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

     //    return view('admin.newsletter.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Newsletter $info)
    {
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if(!Entrust::can("manage-newsletter")) 
        return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $cate = Newsletter::find($id);
        $cate->delete();
        return redirect()->back()->withSuccess("Newsletter deleted successfully.");
    }
    
    public function contactus(){      
         $info= DB::table('contact_us')->paginate(25);   
         return view('admin.contact.index',compact('info')); 
     }
}
