<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Entrust;
use Auth;
use Illuminate\Support\Str;
class ManageCategoryController extends Controller
{
	public function __construct(){
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
    	
    
        $categories = $category->where('parent_id',NULL)->get();
        //->order()->paginate(10);
        //$categories = $category->store()->order()->paginate(20);
        //dd($categories);  
            
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
    	// if(!Entrust::can("category-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");
        //$parentCategory = $category->active()->store()->where('parent_id',NULL)->pluck('name','id','parent_id');
    	//$parentCategory = $category->active()->store()->get();//->pluck('name','id','parent_id');//where('parent_id',NULL)->

        $info =Category::getHierarchy();
        // dd($info);
        return view('admin.category.add',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
    	// if(!Entrust::can("category-create")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

    	$category->fill($request->all()); 
        $category->slug= Str::slug($request->slug);
 
        if( $request->hasFile('image') ){
            $name = $request->file('image')->getClientOriginalName();
            $name = md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->move('images/category',$name);
            $category->image = $name;            
        }

        if( $request->hasFile('thumb_image') ){
            $name = $request->file('thumb_image')->getClientOriginalName();
            $name = 'thumb_'.md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
            $path = $request->file('thumb_image')->move('images/category',$name);
            $category->thumb_image = $name;            
        }

        $category->save();
        return redirect()->back()->withSuccess("Category added successfully.");
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
    	// if(!Entrust::can("category-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

         $categories= Category::find($id);
          $parentCategory =Category::getHierarchy();
         // $parentCategory =Category::active()->store()->where('parent_id',NULL)->where('id','!=',$id)->pluck('name','id');
         return view('admin.category.edit',compact('categories','parentCategory'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

     	// if(!Entrust::can("category-edit")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");


    	$category = Category::find($id);
        $category->fill($request->all()); 
        $category->slug= Str::slug($request->slug); 
            if( $request->hasFile('image') ){
                    $name = $request->file('image')->getClientOriginalName();
                    $name =  md5(uniqid().$name).'.'. $request->file('image')->getClientOriginalExtension();
                    $path = $request->file('image')->move('images/category',$name);
                   $category->image = $name;            
             }

              if( $request->hasFile('thumb_image') ){
                    $name = $request->file('thumb_image')->getClientOriginalName();
                    $name =  'thumb_'.md5(uniqid().$name).'.'. $request->file('thumb_image')->getClientOriginalExtension();
                    $path = $request->file('thumb_image')->move('images/category',$name);
                   $category->thumb_image = $name;            
             }


        $category->save();
        
        return redirect()->back()->withSuccess("Category updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// if(!Entrust::can("category-delete")) 
    	// return redirect(route('admin-dashboard'))->withErrors("Permission denied.");

        $cate = Category::find($id);
        $cate->delete();

         return redirect()->back()->withSuccess("Category deleted successfully.");
    }

}