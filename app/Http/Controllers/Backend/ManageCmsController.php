<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CmsRequest;
use App\Http\Controllers\Controller;
use App\Models\Cms;
//use Entrust;
use Auth;
use Illuminate\Support\Str;
class ManageCmsController extends Controller
{
	public function __construct(){
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cms $info)
    {
    	
    	//if(!Entrust::can("manage-cms")) 
    	//return redirect(route('admin-dashboard'))->withErrors("Permission denied.");      
      

        $info = $info->order()->paginate(10);        
        return view('admin.cms.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// if(!Entrust::can("cms-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        return view('admin.cms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CmsRequest $request, Cms $info)
    {
    	// if(!Entrust::can("cms-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

    	$info->fill($request->all()); 
        $info->slug= Str::slug($request->slug);
		if( $request->hasFile('image') ){
			$name = $request->file('image')->getClientOriginalName();
			$name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
			$path = $request->file('image')->move('images/cms',$name);
			$info->image = $name;            
		 }
		  
        $info->save();
        return redirect()->back()->withSuccess("Cms Page added successfully.");
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
    	// if(!Entrust::can("cms-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

         $info= Cms::find($id); 
         return view('admin.cms.edit',compact('info'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CmsRequest $request, $id)
    {
    	// if(!Entrust::can("cms-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");


    	$info = Cms::find($id);
        $info->fill($request->all()); 
        $info->slug= Str::slug($request->slug);
		if( $request->hasFile('image') ){
				$name = $request->file('image')->getClientOriginalName();
				$name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
				$path = $request->file('image')->move('images/cms',$name);
			   $info->image = $name;            
		 } 
		 

        $info->save();
        
        return redirect()->back()->withSuccess("Cms Page updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// if(!Entrust::can("cms-delete")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $cate = Cms::find($id);
        $cate->delete();

         return redirect()->back()->withSuccess("Category deleted successfully.");
    }

}