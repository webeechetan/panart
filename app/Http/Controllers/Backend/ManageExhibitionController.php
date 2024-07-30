<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExhibitionUpload;
use Auth;

class ManageExhibitionController extends Controller
{
    public function __construct(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$id=$request->id;
        $data = ExhibitionUpload::where('ex_id',$id)->get();
        return view('admin.banner.exhibition',compact('data','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = ExhibitionUpload::all();
       return view('admin.banner.exhibition',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ExhibitionUpload $Upload_model)
    {
        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
        
        if($request->hasfile('filename'))
        {   $data=array();
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
				$name =  md5(uniqid().$name).'.'. $image->getClientOriginalExtension();
                $image->move(public_path().'/images/exhibition/', $name);  // your folder path
                $data[] = array('filename'=>$name,'ex_id'=>$request->ex_id,'status'=>1);//$name;  
            }
        }
       
        ExhibitionUpload::insert($data);
        // $Upload_model->filename = json_encode($data);
        // $Upload_model->ex_id=$request->ex_id;
        // $Upload_model->save();
        return back()->with('success', 'Your images has been upload successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('idx');
 
        $cate = ExhibitionUpload::find($id);
        $cate->delete();

        return redirect()->back()->withSuccess("Image deleted successfully.");
    }
}