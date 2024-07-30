<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\ProductGallery;
use App\Models\Product;
//use Entrust;
use Auth;
use Illuminate\Support\Str;
use Session;
class ManageProductGalleryController extends Controller
{
	public function __construct(){
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, ProductGallery $info)
    {
    	
    	// if(!Entrust::can("manage-product_gallery")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");      
      

        $info = $info->order()->where('product_id',$id)->paginate(10);    

        return view('admin.product_gallery.index',compact('info','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	// if(!Entrust::can("product_gallery-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");


        return view('admin.product_gallery.add',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, ProductGallery $info)
    {
    	// if(!Entrust::can("product_gallery-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

    	$info->fill($request->all()); 
        $info->created_by=Auth::user()->id;
        $info->product_id = $request->product_id;
          if( $request->hasFile('image') ){

                    $name = $request->file('image')->getClientOriginalName();
                    $name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
                    $path = $request->file('image')->move('images/products',$name);
                   $info->image = $name;            
             }
               if( $request->hasFile('thumb_image') ){

                    $name = $request->file('thumb_image')->getClientOriginalName();
                    $name =  md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
                    $path = $request->file('thumb_image')->move('images/products/thumb',$name);
                   $info->thumb_image = $name;            
             }
        $info->save();

        return redirect()->back()->withSuccess("Product gallery created successfully.");
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
    	// if(!Entrust::can("product_gallery-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $info= ProductGallery::find($id);
        return view('admin.product_gallery.edit',compact('info'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
    	// if(!Entrust::can("product_gallery-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");


    	$info = ProductGallery::find($id);
        $info->fill($request->all()); 
        $info->updated_by=Auth::user()->id;
            if( $request->hasFile('image') ){

                    $name = $request->file('image')->getClientOriginalName();
                    $name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
                    $path = $request->file('image')->move('images/products',$name);
                   $info->image = $name;            
             }
               if( $request->hasFile('thumb_image') ){

                    $name = $request->file('thumb_image')->getClientOriginalName();
                    $name =  md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
                    $path = $request->file('thumb_image')->move('images/products/thumb',$name);
                   $info->thumb_image = $name;            
             }

        $info->save();
        return redirect()->back()->withSuccess("Product updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if(!Entrust::can("product_gallery-delete")) 
    	return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $cate = Product::find($id);
        $cate->delete();

         return redirect()->back()->withSuccess("Category deleted successfully.");
    }

}