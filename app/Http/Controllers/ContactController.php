<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Cms;
use Illuminate\Support\Str;
use App\Models\ContactUS;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.pages.home');
    }

    public function cms(Request $request,Cms $info){      
      try {
        $info=Cms::where('slug',Str::slug($request->slug))->active()->get()->first();   
        if($info){
          return view('front.pages.cms',compact('info'));
        }else{
          return abort(404);
        }
      } catch (Exception $error) {
        return back()->withError($exception->getMessage()) ;
      }
      
    }

    // public function contactus(){
    //   return view('front.pages.contact');
    // }

    public function contactus(Request $request){
      $arr=array('msg'=>'Please try again!','success'=>False);
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);
       $result= ContactUS::create($request->all());
       if($result){
         $arr=array('msg'=>'Thanks for contacting us!','success'=>True);
       }
       return Response()->json($arr);
    }

    public function newsletter(Request $request){
      $arr=array('msg'=>'Please try again!','success'=>False);
        $this->validate($request, [        
          'email' => 'required|email',
        ]);
        $isExist= Newsletter::where('email',$request->email)->get()->first();
        if(!$isExist){
          $result= Newsletter::create($request->all());
          if($result){
          $arr=array('msg'=>'Thanks for Subscribing us!','success'=>True);
          }
        }else{
          $arr=array('msg'=>'Already Subscribed!','success'=>False);
        }
       return Response()->json($arr);
    }

    public function product(Request $request)
    {
      $product=array();$category=array();$pcategory=array();$productRelated=array();
      if($request->category && $request->subcategory){
        $pcategory=Category::where(["slug"=>$request->category])->active()->get()->first();
        $category= Category::where([ "slug"=>$request->subcategory])->active()->get()->first(); 
          $products=Product::select('product.*')->where(
            function($query) use ($category)
            {
              $query->whereRaw('FIND_IN_SET(?,category_id)', [$category->id]) ;
            })
          ->where('product.status',1)  
          ->get(); 
          $product=$products;   
          // foreach($products as $value){   
          //   if($value->related_product)
          //   $productRelated[$value->sku]=Product::select('product.thumb_image','id','slug')->whereIn('sku',explode(',',$value->related_product))->active()->get();
          // }     
      }
      return view('front.pages.productlist',compact('product','category','pcategory','productRelated'));
    }

    public function category(Request $request)
    {
        $category=array();
        $subcategory=array();
        if($request->slug){
            $category= Category::where([ "slug"=>$request->slug,"parent_id"=>Null])->active()->get();//->toArray();
            if($category){
             $subcategory=Category::where(["parent_id"=>$category[0]->id])->active()->get();   
            }
        }
        return view('front.pages.category',compact('category','subcategory'));
    }

    public function productdetail(Request $request)
    {
      $product=array();$category=array();$pcategory=array();$productRelated=array();$productGallery=array();
      if($request->category && $request->subcategory){
        //$pcategory=Category::where(["slug"=>$request->category])->active()->get()->first();
        $category= Category::where([ "slug"=>$request->category])->active()->get()->first(); 
        $pcategory=Category::where(["id"=>$category->parent_id])->active()->get()->first();
          $product=Product::select('product.*')->where(["slug"=>$request->subcategory])          
          ->where('product.status',1)  
          ->get()->first();    
          $productGallery= ProductGallery::where("product_id",$product->id)->active()->get();
          //dd($productGallery);
          // foreach($products as $value){   
          if($product->related_product){
            $productRelated=Product::select('category_id','product.thumb_image','id','slug')->whereIn('sku',explode(',',$product->related_product))->active()->get();
          }
          // }     
      }
      return view('front.pages.product',compact('product','category','pcategory','productRelated','productGallery'));

    }
}
