<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller; 
use App\Models\Category;
use App\Models\Product; 
use Auth;
use Illuminate\Support\Str;
use Session;
use DB;

class ManageProductController extends Controller
{
	public function __construct(){
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Product $info )
    {    	  
        $info = $info->order();
        if($request->has('product') && !empty($request->product)) {                   
           $info->where('title', 'like','%'.$request->product.'%');
        }
        if($request->has('sku') && !empty($request->sku)){
            $info->where('sku', 'like', '%'.$request->sku.'%');
        }
       
        //echo $request->sku;
        $info=$info->paginate(25);
        return view('admin.product.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    { 
        $skipCategory=array('packages','package');
        //$category = $category->active()->store()->where('parent_id',NULL)->whereNotIn('slug', $skipCategory)->get();
    	$category = $category->active()->where('parent_id',NULL)->whereNotIn('slug', $skipCategory)->get();
        $product_price=array();       
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $info)
    {    	 
    	$info->fill($request->all()); 
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
        $info->category_id= implode( ",", $request->category);
        //$info->product_type='basic';
        $info->save();
        $last_insert_id= $info->id;
        // if($request->product_price){
        //     foreach ($request->product_price as $key => $value) {
        //         $productprice= new ProductPrice;
        //         $titel = 'title_'.$value;  $price = 'price_'.$value;
        //         $productprice->product_id = $last_insert_id;
        //         $productprice->title = $request->$titel;
        //         $productprice->price = $request->$price;
        //         $productprice->save();    
        //     }
        // }
       // $info->faqInsert($last_insert_id);
        return redirect()->back()->withSuccess("Product created successfully.");
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

    public function search(Request $request,Product $info){
        if(!Entrust::can("manage-product")) 
        return redirect(route('admin-dashboard'))->withErrors("Permission denied.");
       // DB::enableQueryLog();
        $info = $info->order();
        if($request->has('product') && !empty($request->product)) {                   
           $info->where('title', 'like','%'.$request->product.'%');
        }
        if($request->has('sku') && !empty($request->sku)){
            $info->where('sku', 'like', '%'.$request->sku.'%');
        }
        //echo $request->sku;
       
        $info=$info->paginate(10);
        //dd(DB::getQueryLog());
        
        return view('admin.product.index',compact('info'))->withInput(Input::all());
        // else{
        //    return redirect(route('manage-product'))->withErrors("Please try with other keyword."); 
        // } 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $info= Product::find($id);
        //$product_price= $productprice->where("product_id",$id)->get();
         //$category = Category::active()->store()->where('parent_id',NULL)->get();
        $skipCategory=array('packages','package');
        $category = Category::active()->where('parent_id',NULL)->whereNotIn('slug', $skipCategory)->get();
       
        return view('admin.product.edit',compact('category','info'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id )
    {
        // dd($request);
    	// if(!Entrust::can("product-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");
    	$info = Product::find($id);
        $info->fill($request->all()); 
        $info->slug= Str::slug($request->slug);
        $info->category_id= implode( ",", $request->category);
        $info->description = addslashes($request->description);
        //$info->updated_by=Auth::user()->id;
        $info->is_featured=$request->is_featured;
        // $info->inventorysku=$request->inventorysku;
        // $info->is_premium=$request->is_premium;
       //print_r($info);die; 
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
        // $priceProd= ProductPrice::where('product_id',$id);
        // if(is_null($request->product_price) || $priceProd->count()>0){
        //     $cate = ProductPrice::where('product_id',$id);
        //     $cate->delete();
        // }
        // if($request->product_price){
        //     foreach($request->product_price as $key => $value) {
        //         $title = 'title_'.$value;  $price = 'price_'.$value;
        //         $priceData = $productprice->firstOrNew(["id"=>$value]);
        //         $priceData->product_id = $id;
        //         $priceData->title = $request->$title;
        //         $priceData->price = $request->$price;
        //         $priceData->save();    
        //     }
        // }
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
    	if(!Entrust::can("product-delete")) 
    	return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $cate = Product::find($id);
        $cate->delete();

         return redirect()->back()->withSuccess("Category deleted successfully.");
    }    
}