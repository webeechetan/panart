<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ExhibitionUpload;
use Auth;

class ManageBannerController extends Controller
{
    public function __construct(){

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Banner $info)
    { 

        $info = $info->order()->paginate(10);   
        return view('admin.banner.index',compact('info'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Banner $info)
    {  
        return view('admin.banner.add',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Banner $info,ExhibitionUpload $Upload_model)
    {
    	$info->fill($request->all());         
            if( $request->hasFile('image') ){
                $name = $request->file('image')->getClientOriginalName();
                $name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->move('images/banner',$name);
               $info->image = $name;            
            } 
            if( $request->hasFile('thumb_image') ){
                $name = $request->file('thumb_image')->getClientOriginalName();
                $name = 'thumb_'.md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
                $path = $request->file('thumb_image')->move('images/banner/thumb_image/',$name);
                $info->thumb_image = $name;            
            }   

            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/exhibition/', $name); //your folder path
                    $data[] = $name;  
                }

                //$Upload_model = new ExhibitionUpload;
                $Upload_model->filename = json_encode($data);
                $Upload_model->save();

            }      
        $info->save();
        return redirect()->back()->withSuccess("Banner created successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$info= Banner::find($id);
        return view('admin.banner.edit',compact('info'));
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
    	$info = Banner::find($id);
        $info->fill($request->all()); 
        if( $request->hasFile('image') ){
            $name = $request->file('image')->getClientOriginalName();
            $name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->move('images/banner',$name);
           $info->image = $name;            
        }  
        if( $request->hasFile('thumb_image') ){
            $name = $request->file('thumb_image')->getClientOriginalName();
            $name = 'thumb_'.md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
            $path = $request->file('thumb_image')->move('images/banner/thumb_image/',$name);
            $info->thumb_image = $name;            
        }          
        $info->save();
        return redirect()->back()->withSuccess("Banner updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Banner::find($id);
        $cate->delete();
        return redirect()->back()->withSuccess("Banner deleted successfully.");
    }	
}
