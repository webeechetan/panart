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
use DB;
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
        
   
    $name=$request->name;
    $email=$request->email;
    $mobile=$request->mobile;
    $msg=$request->message;
    $cname='Panart Global';
    $fromemail="panartindia@gmail.com";
    $to_email="info@panartglobal.com";
    $sub="Enquiry via Website";    
    $messages = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight:bold;">
        <tr><td>Here is the Query Form</td><td></td></tr> <br />
        <tr>
        <td>Name : '.$name.' </td>
        </tr>
        <tr>
        <td>Email : '.$email.' </td>
        </tr>
        <tr>
        <td>Contact : '.$mobile.'</td>
        </tr>
		<tr>
        <td>Message : '.$msg.'</td>
        </tr>
       
        </table>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $fromemail" . "\r\n"; 
    $sendmail=mail($to_email, $sub, $messages, $headers);
        
     //echo "<pre>"; print_r($data); die;   
        

        $fields = array(
			"fname" => "$name",
			"email" => "$email",
			"contact_number" => "$mobile",
			"message" => "$msg",
			"form_name" => "Panart Contact Us form details",
			"lead_url" => "https://www.panartglobal.com/contact",
			"lead_date" => date("Y-m-d H:i:s")
		);	
        $json = json_encode($fields);
        $url = 'https://panartglobal.com/panartglobal/post_api.php';
        $ch = curl_init($url);
         
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json)
        ));
         
        $response = curl_exec($ch);
        //if(curl_errno($ch)) {
           // echo 'Error: ' . curl_error($ch);
        //} else {
           // echo $response;
       // }
        curl_close($ch);
        

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
          $products = $this->getProduct($category);          
          $product=$products;
          if($products->count()==1){
           //echo $pcategory->id.'=='.$category->id;die;
            $pcategory=Category::where(["id"=>$category->parent_id])->active()->get()->first();
            $prod= $this->getProduct($category); 

            if($prod->count()==1){
               
              $productGallery= ProductGallery::where("product_id",$prod->first()->id)->active()->get();   
              if($prod->first()->related_product){
                $productRelated=Product::select('category_id','product.thumb_image','id','slug','title')->whereIn('sku',explode(',',$prod->first()->related_product))->active()->get();
              }
              $product=$prod->first();
              return view('front.pages.product',compact('product','category','pcategory','productRelated','productGallery'));
            }      
          }
              
      }
      return view('front.pages.productlist',compact('product','category','pcategory','productRelated'));
    }
    protected function getProduct($category){
      $products=Product::select('product.*')->where(
      function($query) use ($category)
      {
        $query->whereRaw('FIND_IN_SET(?,category_id)', [$category->id]) ;
      })  
      ->orderBy('sequence','ASC')       
      ->where('product.status',1)  
      ->get(); 

      return $products;
    }
    public function category(Request $request)
    {
        $category=array();
        $subcategory=array();
        if($request->slug){
            $category= Category::where([ "slug"=>$request->slug,"parent_id"=>Null])->active()->get();//->toArray();
            if($category){
             $subcategory=Category::where(["parent_id"=>$category[0]->id])->orderBy('sequence','ASC')->active()->get();   
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
            $productRelated=Product::select('category_id','product.thumb_image','id','slug','title')->whereIn('sku',explode(',',$product->related_product))->active()->get();
          }
          // }     
      }
      return view('front.pages.product',compact('product','category','pcategory','productRelated','productGallery'));

    }

    public function search(Request $request){
      $search= $request->search;
      if(isset($search)){
        $pattern = '%'.$search.'%';
        $searchRes = '';
        $product= DB::select( DB::raw(" select title,slug,description,short_description,category_id from product where description like '".$pattern."' or title like '".$pattern."'"));
        if(!empty($product)){
          foreach($product as $value){
            $category=DB::select(DB::raw("select id,name,slug from categories where id in (".$value->category_id.") and parent_id IS NOT NULL limit 1"));
            //print_r($category[0]->slug);die;
            $products = $this->getProduct($category[0]);
            if($products->count()==1){
             $url = url('product/'.$category[0]->slug.'/'.$value->slug);
            }else{
              $url = url('detail/'.$category[0]->slug.'/'.$value->slug);
            }
            $searchRes.='<li><b>'.$value->title.'</b><a href="'.$url.'" target="blank"></a></br><p>'. limit_words($value->short_description,20).' </p></li>';
          }
          echo $searchRes;exit;
        }else{
          echo '<li style="color:red;"> Data not found !</li>';
        exit;
        }
      }      
    }
}
