<?php

namespace App\Models;
//use App\Models\ProductFaq;
use Illuminate\Database\Eloquent\Model;
//use Session;
use DB;

class Product extends Model
{
      protected $fillable = [
        'category_id','title','slug','description','short_description','product_type','visibility','sku',
        'meta_title',
        'meta_keyword','meta_description','is_featured','price','sequence','related_product'
      ];

      protected $table = "product";

    // public function variant(){
    //     return $this->hasMany('App\Models\ProductVariant', 'product_id','id');
    //   }
  // public function variant(){
  //   return $this->belongsTo('App\Models\ProductVariant');
  // }     
 
  public function scopeOrder($query)
  {  	
       return $query->orderBy('id', 'Desc');
  }
  

  public function scopeActive($query)
  {
  	return $query->where('status', '=', 1);
  }


  public function category()
  {
     return $this->hasOne('App\Models\Category','id','category_id');
  }
  
  // public function faqInsert($id){
  //   $select = ProductFaq::where(['is_default'=>1,'product_id'=>0])->select('title','description');
  //   $select =$select->addSelect(DB::raw("'$id' as product_id"));
  //   ProductFaq::insertUsing(['title','description','product_id'], $select);
  //   //return $id.'product model is called';
  // }

}
